<?php

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

Route::group(['middleware' => ['web']],function(){
  Route::resource('blog','BlogController');
  Route::get('/home', 'BlogController@index');
  Route::get('/', 'BlogController@show');
  Route::get('/single', 'BlogController@single');
  Route::get('post/{slug}',['as'=>'post.single','uses'=> 'PostController@getSingle'] ) ->where('slug' ,'[\w\d\-\_]+');
  //comments
  Route::post('comments/{blog_id}', ['uses'=>'CommentsController@store' , 'as'=>'comments.store']);
  Route::delete('comments/{blog_id}',['uses'=>'CommentsController@destroy' , 'as'=>'comments.destroy']);

});

Auth::routes();
