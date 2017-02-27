<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Blog;

class PostController extends Controller
{
    public function getSingle($slug){
      // detch from database
      $create_post =Blog::select('user_id');
      $blog = Blog::where('slug' , '=', $slug)->first();
      $data= Blog::all();
      $owner=Auth::user()->id->$create_post;

        //return view
      return view ('post.single')->with('owner', $blog);


    }
}
