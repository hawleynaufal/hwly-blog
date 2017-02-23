<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;

class PostController extends Controller
{
    public function getSingle($slug){
      // detch from database
      $blog = Blog::where('slug' , '=', $slug)->first();
      $data= Blog::all();
        //return view
      return view ('post.single')->with('data', $blog);


    }
}
