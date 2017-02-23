@extends('master')

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
  @foreach($shows as $show)
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="jdl page-header">{{$show->title}}</div>
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
      {{$shows->links()}}
</div>
@stop
