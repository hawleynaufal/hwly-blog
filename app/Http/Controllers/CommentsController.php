<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Blog;
use Auth;
use Session;

class CommentsController extends Controller
{
  public function getBlog_id($id){
      //detching data
      $blog = Blog::where('id','=',$id)->first();
      $comment= Blog::all();

      //return view
      return view ('blog.comment')->with('comment', $blog);
    }

    public function store(Request $request , $blog_id)
    {
      if (Auth::check()) {
        $this->validate($request , array(
          'comment' =>'required|min:3|max:2000',
        ));
      }else{
        $this->validate($request , array(
          'name'  =>'required|max:255',
          'email' =>'required|email|max:255',
          'comment' =>'required|min:3|max:2000',
        ));
      }
      $blog = Blog::find($blog_id);
      $comment = new Comment();
      if (Auth::check()) {
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
      }else{
        $comment->name = $request->name;
        $comment->email = $request->email;
      }
      $comment->comment = $request->comment;
      $comment->approved = true;
      $comment->blog()->associate($blog);
      $comment->save();
      Session::flash('success' , 'The comment has been post');
      return redirect()->route('post.single', [$blog->slug]);
    }

}
