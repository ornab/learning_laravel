<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

/*
|--------------------------------------------------------------------------
|If the Model class is like PostAdmin then we have to declare a protected table otherwise it will expect a table like postsadmins
|And If the primary key is differrent than 'id' then we have to define it here like 'post_id'
|--------------------------------------------------------------------------
|
*/
    //protected $table = 'posts'; //Now we can use the posts table with the class PostAdmin
    // protected $primaryKey = 'post_id'; //Now we can use 'post_id' as primary key
     
    
    
}
