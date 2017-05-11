<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;

/*
|--------------------------------------------------------------------------
|If the Model class is like PostAdmin then we have to declare a protected table otherwise it will expect a table like postsadmins
|And If the primary key is differrent than 'id' then we have to define it here like 'post_id'
|--------------------------------------------------------------------------
|
*/
    //protected $table = 'posts'; //Now we can use the posts table with the class PostAdmin
    // protected $primaryKey = 'post_id'; //Now we can use 'post_id' as primary key
    
    
    protected $dates = ['deleted_at'];
     
    
    protected $fillable = [
        
        'title',
        'content'
        
    ];
    
    public function user(){
        
        return $this->belongsTo('App\User');
    }
    
    
    public function photos(){
    
         return $this->morphMany('App\Photo','imageable');
    
}

     public function tags(){
         
         return $this->morphToMany('App\Tag', 'taggable');
         
     }    



}

    








