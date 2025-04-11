<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\EmailListFactory;
use App\Models\Subscribers;

class EmailList extends Model
{
    //

    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }

}
