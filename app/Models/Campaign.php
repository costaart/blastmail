<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\EmailList;

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

}
