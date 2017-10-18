<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $text;

    protected $topic_id;

    protected $fillable = ['text', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
