<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Blog;

class PostController extends Controller
{
  public function index()
  {
    $cari=\Request::get('search');

    //$post=Blog::all()->where('user_id','=',$loggedInUserId);
    $shows= Blog::where('title','like','%'.$cari.'%')->orderBy('id')->paginate(4);
    return view('post.show',['shows' => $shows]);
  }

    public function getSingle($slug){
      // detch from database
      $blog = Blog::where('slug' , '=', $slug)->first();
      $data= Blog::all();
        //return view
      return view ('post.single')->with('data', $blog);
    }

    public function update(Request $request, $id)
    {
        //validation
        $blog=Blog::find($id);

        //create new data
        $blog->visit = $request->visit;

        $blog ->save();
        return redirect()->route('blog.index')->with('alert-success','Data Has been Saved');
        Session::flash('success','The Post has been saved');
    }


}
