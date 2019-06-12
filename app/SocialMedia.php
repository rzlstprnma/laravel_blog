<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = ['user_id', 'media_name', 'link'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
