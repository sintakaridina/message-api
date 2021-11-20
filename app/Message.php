<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'deliver_id', 'sender_id', 'content'
    ];
}
