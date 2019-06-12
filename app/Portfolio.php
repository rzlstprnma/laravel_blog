<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['user_id', 'project_name', 'photo', 'description'];

    public function getPhoto(){
        return asset('/images/portfolio_images/'. $this->photo);
    }
}
