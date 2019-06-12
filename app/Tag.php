<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_name'];

    
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'tag_post', 'tag_id', 'post_id');
    }

}
