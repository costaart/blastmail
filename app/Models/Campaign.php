<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\EmailList;
use App\Models\CampaignMail;
use App\Models\Subscriber;

class Campaign extends Model
{

    use HasFactory;
    use SoftDeletes;

    public function casts()
    {
        return [
            'send_at' => 'datetime',
        ];
    }

    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }

    public function mails()
    {
        return $this->hasMany(CampaignMail::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

}
