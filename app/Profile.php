<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'bio','phone', 'photo', 'address', 'web'];

    public function getPhoto(){
        return asset('images/user_images/'.$this->photo);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
