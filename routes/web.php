<?php

use App\Post;

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
    
  $post = Post::find(6);
    
       
   $post->delete();
});






















