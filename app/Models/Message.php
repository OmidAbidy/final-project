<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Message.php
class Message extends Model
{
    protected $fillable = ['clientjob_id', 'sender_id', 'receiver_id', 'body'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function job()
    {
        return $this->belongsTo(ClientJob::class, 'clientjob_id');
    }
}
