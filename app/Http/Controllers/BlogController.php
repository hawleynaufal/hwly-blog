<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blog;
use Storage;
use Image;
use Session;
use Auth;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$blogs= Blog::all();

      //return view('blog.index',['blogs' => $blogs]);
      $loggedInUserId=Auth::user()->id;
      $search=\Request::get('search');

      //$post=Blog::all()->where('user_id','=',$loggedInUserId);
      $post= Blog::where('title','like','%'.$search.'%')->where('user_id','=',$loggedInUserId)->orderBy('id')->paginate(4);
      return view('blog.index',['post' => $post ]);
    }

    public function getSingle($slug){
      // detch from database
      $blog = Blog::where('slug' , '=', $slug)->first();
      $data= Blog::all();
        //return view
      return view ('post.single')->with('data', $blog);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('blog.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validation
        $this->validate($request,[
          'title'=>'required',
          'slug'=>'required|alpha_dash',
          'description'=>'required',
          'image' => 'sometimes|image',

        ]);
        //create new data
        $blog = new blog;
        $blog ->title =$request->title;
        $blog ->slug =$request->slug;
        $blog->user_id=Auth::id();
        $blog ->description =$request->description;


        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/post/' . $filename);
          Image::make($image)->save($location);

          $blog->image = $filename;
        }

        $blog->save();
        return redirect()->route('blog.index')->with('alert-success','Data Has been Saved');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function single()
    {
      $shows= Blog::paginate(3);

      return view('post.single',['singles' => $singles]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        //return to the edit views
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $blog=Blog::find($id);

        if($request->input('slug')==$blog->slug){
          $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
          ]);
        }else{
          $this->validate($request,[
            'title'=>'required',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:blog_post,slug',
            'description'=>'required',
            'image' => 'image',
          ]);
        }

        //create new data
        $blog = Blog::findOrFail($id);
        $blog ->title =$request->title;
        $blog->visit = $request->visitCount;
        $blog ->slug =$request->slug;
        $blog ->description =$request->description;

        if ($request->hasfile('image')) {
          //add new database
          $image = $request->file('image') ;
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/post/' . $filename);
          Image::make($image)->save($location);
          $oldFilename = $blog->image;
          //udpate the database
          $blog->image = $filename;
          //Delete the old photo
          Storage::delete($oldFilename);
        }

        $blog ->save();
        return redirect()->route('blog.index')->with('alert-success','Data Has been Saved');
        Session::flash('success','The Post has been saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        //delete data
          $blog = Blog::findOrFail($id);
          Storage::delete($blog->image);
          $blog ->delete();
          return redirect()->route('blog.index')->with('alert-success','Data Has been Deleted');
    }
}
