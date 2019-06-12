<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'isPublished', 'photo', 'slug'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_post', 'post_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getPhoto(){
        return asset('/images/post_images/'.$this->photo);
    }

}
