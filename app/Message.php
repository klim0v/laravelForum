<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $topic_id;

    protected $text;

    protected $fillable = ['text', 'topic_id'];
}
