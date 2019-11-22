<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $post = Post::create(['name'=>'Lovely Post']);
    $tag = Tag::findOrFail(2);
    $post->tags()->save($tag);


    $video = Video::create(['name'=> 'Video.mov']);
    $tag2 = Tag::findOrFail(2);
    $video->tags()->save($tag2);
});

Route::get('/read', function(){
    // $post = Post::findOrFail(1);
    $video = Video::findOrFail(1);
    foreach($video->tags as $tag) {
        echo $tag->name;
    };
});


Route::get('/update', function(){
    // $post = Post::findOrFail(1);
    $video = Video::findOrFail(1);
    foreach($video->tags as $tag) {
        $tag->whereName('Xampp')->update(['name'=>'PHP']);
        $tag->save();
    };
});

// not well conviced
Route::get('/delete', function(){
    $post = Post::findOrFail(3);

    foreach($post->tags as $tag) {
        $tag->whereId(3)->delete();
    }
});