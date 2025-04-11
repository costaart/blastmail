<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    public function index(EmailList $emailList)
    {
        $search = request('search');
    
        if ($search) {
            $subscribers = $emailList->subscribers()
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                })
                ->paginate();
        } else {
            $subscribers = $emailList->subscribers()->paginate();
        }
    
        return view('subscribers.index', [
            'emailList' => $emailList,
            'subscribers' => $subscribers,
            'search' => $search,
        ]);
    }

    public function create(EmailList $emailList)
    {
        return view('subscribers.create', [
            'emailList' => $emailList,
        ]);
    }

    public function store(EmailList $emailList)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('subscribers')->where('email_list_id', $emailList->id)],
        ]);

        $emailList->subscribers()->create($data);

        return to_route('subscribers.index', $emailList)->with('success', __('Subscriber added successfully.'));
    }

    public function destroy(mixed $list, Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('success', __('Subscriber deleted successfully.'));
    }
    
}
