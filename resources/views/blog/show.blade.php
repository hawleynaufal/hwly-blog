@extends('master')
@section('title','Blog Anu')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 jumbotron">
      <h1>Blog Gue</h1>
    <p><i>The Larges Web of family's stories </i></p>
    </div>
    <div class="col-md-2"></div>
  </div>
@if(Auth::check())
<h4><b><a href="/blog">Manage Post</a></b></h4>
@endif

  @foreach($shows as $show)
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

      <div class="jdl page-header"><a href="../post/{{ $show->slug }}">{{$show->title}}</a></div>

      <div class="isi">
        {!! str_limit($show->description, $limit= 300 , $end= '...... ')!!}
        <!--{!!$show->description!!} <a href='.url("/".$post->slug). -->
      </div>
      <p>url: {{url($show -> slug)}}</p>
      <hr>
    </div>
    <div class="col-md-2"></div>
  </div>


      @endforeach
</div>
{{$shows->links()}}
@stop
