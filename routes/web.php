<?php

use App\Post;
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//
//
//Route::get('/post/{id}',function($id){
//    
//    
//    return "This is the post number ".$id; 
//    
//});


//Route::resource('posts', 'PostsController');

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Database Raw SQL Queries 
|--------------------------------------------------------------------------
|
*/

//Route::get('/insert',function(){
//    
//    DB::insert('insert into posts(title,content) values(?, ?)', ['PHP with Laravel 2', 'Laravel is the best thing to happened for php']);
//    
//});
//
//Route::get('/read', function(){
//    
//  $results = DB::select('select * from posts where id=?', [1]);
//    
//    foreach($results as $post){
//        
//        echo $post->title . ' ' . ' & ';
//        echo $post->content;
//        
//        
//    }
//       
//});
//
//Route::get('/update', function(){
//    
//    $updated = DB::update('update posts set title = "updated title" where id=?', [1]);
//    
//    return $updated;
//    
//    
//});
//
//Route::get('/delete', function(){
//    
//   $deleted = DB::delete ('delete from posts where id=?', [1]);
//    
//    return $deleted;
//    
//});

/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
|
*/

Route::get('/read', function(){
    
    $posts = Post::all();
    
    foreach($posts as $post){
        
        echo $post->title .'<br>';
        echo $post->content.'<br>';
        
        
    }
    
    
});


Route::get('/find',function(){
    
    $posts = Post::find(1);
    
    return $posts->title;
    
//    foreach($posts as $post){
//        
//        return $post->title;
//        
//    }
    
    
});
//
//Route::get('/findwhere', function(){
//    
//    
//    $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//    
//    foreach($posts as $post){
//        
//        return $post->title;
//        
//    }
//    
//});
//
////Route::get('/findmore', function(){
////    
//////    $posts= Post::findOrFail(1);
//////    return $posts;
////    
////    $posts = Post::where('users_count', '<', 50)->findOrFail();
////    
////    
////});
//
//Route::get('/basicinsert', function(){
//    
//    $post = new Post;
//    
//    $post->title = 'PHP & Laravel 3';
//    $post->content = 'Eloquent way of inserting';
//    
//    $post->save();
//    
//    
//    
//});

//Route::get('/basicupdate', function(){
//    
//    $post = Post::find(1);
//    
//    $post->title = 'PHP & Laravel 3';
//    $post->content = 'Eloquent way of inserting';
//    
//    $post->save();
//    
//    
//    
//});


Route::get('/create', function(){
    
    
   Post::create(['title'=>'This is Eloquent Create 2', 'content'=>'Wow eloquent is really awesome!']);
    
   
    
});

Route::get('/update', function(){
    
   Post::where('id', 3)->where('is_admin', 0)-> update(['title'=>'Eloquent update', 'content'=>'Updating with eloquent is awesome']); 
    
});

Route::get('/delete', function(){
    
  $post = Post::find(5);
    
       
   $post->delete();
});

//Route::get('/delete2', function(){
//    
//    Post::destroy(4); //single item delete
//    Post::destroy([4,5]); //multiple items delete
//    
//    //Another method (if I want to run query)
//    
//    Post::where('id', 4)->where('is_admin', 0)->delete();
//    
//    
//});

Route::get('/softdelete', function(){
    
    Post::find(4)->delete();
    
    
});

//Route::get('/readsoftdelete', function(){
//    
////    $post = Post::find(4);
////    
////    return $post;
//    
// // $post =  Post::withTrashed()->where('id', 4)->get();  // It will return all items including trashed items
//    
//   $post = Post::onlyTrashed()->where('is_admin', 0)->get(); // It will return only trashed items
//    
//    return $post;
//    
//});
//
//Route::get('/restore', function(){
//    
//    
//    Post::withTrashed()->where('is_admin', 0)->restore();
//    
//    
//});


Route::get('/forcedelete', function(){
    
    //Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
    
    Post::withTrashed()->where('id', 5)->forceDelete();
    
    
    
});

/*
|--------------------------------------------------------------------------
| Eloquent Relationships
|--------------------------------------------------------------------------
|
*/

//One to One Relationship (hasOne) 

//Route::get('/user/{id}/post', function($id){
//    
//    
//    $post = User::find($id)->post->title;
//    
//    return $post;
//    
//});

//Inverse /One to One Relationship 

//Route::get('/post/{id}/user', function($id){
//    
//    
//   return Post::find($id)->user->name;
//    
//
//});

//One to Many Relationship (hasMany)

Route::get('/posts', function(){
    
    $user = User::find(1);
    
    foreach($user->posts as $post){
        
        echo $post->title . "<br>";
       // echo $post->content . "<br>";
        
    }
    
    
});


//Many to Many Relationship (belongsToMany)


Route::get('/user/{id}/role', function($id){
    
//   $user = User::find($id);
//    
//    foreach ($user->roles as $role){
//        
//        echo $role->name . "<br";
//        
//    }
//    
    
    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    
    return $user;
    
});























