<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function post(){                  
                                            //
        return $this->hasOne('App\Post');   //It will automatically refer to 'user_id', if you have to refer to another column                                         // then you have to define that as a second parameter,                                                                     // Like  "return$this>hasOne('App\Post','the_user_id');"
                                            //
    }
    
    
    public function posts(){
        
        return $this->hasMany('App\Post');
        
    }
    
    public function roles(){
        
        return $this->belongsToMany('App\Role');
    }
    
    
}
