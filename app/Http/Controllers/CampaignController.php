<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\EmailList;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CampaignStoreRequest;
use App\Mail\EmailCampaign;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Jobs\SendEmailsCampaign;





class CampaignController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $campaigns = Campaign::where('name', 'like', "%{$search}%")->paginate();
        } else {
            $campaigns = Campaign::paginate();
        }

        return view('campaigns.index', [
            'campaigns' => $campaigns,
            'search' => $search,
        ]);
    }

    public function create(?string $tab = null)
    {

        $data = session()->get('campaigns::create', [
            'name' => null,
            'subject' => null,
            'email_list_id' => null,
            'template_id' => null,
            'body' => null,
            'track_click' => null,
            'track_open' => null,
            'send_at' => null,
            'send_when' => 'now',
        ]);

        if($data['email_list_id'] !== null && $data['template_id'] !== null ) {
            $count = EmailList::find($data['email_list_id'])->subscribers()->count();
            $template = Template::find($data['template_id'])->name;
        } else {
            $count = null;
            $template = null;
        }

        return view('campaigns.create', [
            'tab' => $tab,
            'emailLists' => EmailList::query()->select('id', 'title')->orderBy('title')->get(),
            'templates' => Template::query()->select('id', 'name')->orderBy('name')->get(),
            'countEmails' => $count,
            'template' => $template,
            'form' => match($tab) {
                'template' => 'template',
                'schedule' => 'schedule',
                default => 'config',
            },
            'data' => $data,
        ]);
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('campaigns.index')->with('success', __('Campaign deleted successfully.'));
    }

    public function store(CampaignStoreRequest $request, ?string $tab = null)
    {

        $data = $request->getData();
        $toRoute = $request->getToRoute();

        if($tab == 'schedule') {
            $campaign = Campaign::create($data);

            SendEmailsCampaign::dispatchAfterResponse($campaign);
    
        }

        return response()->redirectTo($toRoute);

    }

    public function showStatistics(Campaign $campaign)
    {

        $query = $campaign->mails()
        ->selectRaw('
            count(subscriber_id) as total_subscribers,
            sum(openings) as total_openings,
            count(case when openings > 0 then subscriber_id end) as unique_openings,
            round((count(case when openings > 0 then subscriber_id end) / count(subscriber_id)) * 100) + 0 as openings_rate,
            sum(clicks) as total_clicks,
            count(case when clicks > 0 then subscriber_id end) as unique_clicks,
            round((count(case when clicks > 0 then subscriber_id end) / count(subscriber_id)) * 100) + 0 as clicks_rate
        ')
        ->first();
    
        
        $search = request('search');

        return view('campaigns.show', [
            'campaign' => $campaign,
            'tab' => 'statistics',
            'search' => $search,
            'query' => $query,
        ]);
    }

    public function showOpen(Campaign $campaign)
    {
        
        $search = request('search');

        $query = $campaign->mails()
        ->with('subscriber')
        ->whereHas('subscriber', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        })
        ->orderByDesc('openings')
        ->simplePaginate(5);

        return view('campaigns.show', [
            'campaign' => $campaign,
            'tab' => 'open',
            'search' => $search,
            'query' => $query,

        ]);
    }

    public function showClicked(Campaign $campaign)
    {
        $search = request('search');

        $query = $campaign->mails()
        ->with('subscriber')
        ->whereHas('subscriber', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        })
        ->orderByDesc('clicks')
        ->simplePaginate(5);

        return view('campaigns.show', [
            'campaign' => $campaign,
            'tab' => 'clicked',
            'search' => $search,
            'query' => $query,

        ]);
    }
}
