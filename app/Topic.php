<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $title;

    protected $category_id;

    protected $fillable = ['title', 'category_id'];

    public function messages()
    {
        return $this->hasMany('App\Message');
    }
}
