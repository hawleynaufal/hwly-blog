<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blog;
use Session;

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

      $search=\Request::get('search');

      $blogs= Blog::where('title','like','%'.$search.'%')->orderBy('id')->paginate(4);
      return view('blog.index',['blogs' => $blogs]);
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

        ]);
        //create new data
        $blog = new blog;
        $blog ->title =$request->title;
        $blog ->slug =$request->slug;
        $blog ->description =$request->description;
        $blog->save();


        return redirect()->route('blog.index')->with('alert-success','Data Has been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $shows= Blog::paginate(3);

      return view('blog.show',['shows' => $shows]);


    }
    public function single()
    {
      $shows= Blog::paginate(3);

      return view('blog.single',['singles' => $singles]);


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
          ]);
        }

        //create new data
        $blog = Blog::findOrFail($id);
        $blog ->title =$request->title;
        $blog ->slug =$request->slug;
        $blog ->description =$request->description;
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
          $blog ->delete();
          return redirect()->route('blog.index')->with('alert-success','Data Has been Deleted');
    }
}
