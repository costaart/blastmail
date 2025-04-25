<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Campaign;
use App\Models\Subscriber;
use App\Observers\CampaignObserver;
use Illuminate\Database\Eloquent\Casts\Attributes\ObservedBy;


class CampaignMail extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignMailFactory> */
    use HasFactory;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
}
