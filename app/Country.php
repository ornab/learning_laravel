<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){
        
        return $this->hasManyThrough('App\Post', 'App\User');
        
        //If we need to modify, and if there is a different name for user_id like the_user_id, we would refer this as a 3rd //parameter
        
       // return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'the_user_id');
        
    }
}
