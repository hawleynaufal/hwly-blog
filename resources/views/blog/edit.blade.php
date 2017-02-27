@extends('master')
  @section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 jumbotron">
      <h1>Edit Data</h1>
    <p><i>Edit your own stories</i></p>
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <form class="" action="{{route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        {{csrf_field()}}
        <div class="form-group{{($errors->has('title'))? $errors->first('title') : ''}}">
          <label>Title:</label>
          <input type="text" name="title" class="form-control" value="{{$blog->title}}" placeholder="Enter Title Here">
          {!! $errors->first('title','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group{{($errors->has('title'))? $errors->first('title') : ''}}">
          <label>Slug:</label>
          <input type="text" name="slug" class="form-control " value="{{$blog->slug}}"placeholder="Enter Slug Here" required="" minlength="5" maxlength="255" >
          {!! $errors->first('slug','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
            <label>Selecet Image to upload :</label>
            <input type="file" name="image" id="file"></input>
        </div>

        <div class="form-group{{($errors->has('description'))? $errors->first('title') : ''}}">
          <input type="text" name="description" class="form-control" id="mytextarea" value="{{$blog->description}}" placeholder="Enter Description Here">
          {!! $errors->first('description','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group">
          <input type="submit" class='btn btn-primary' value="save">
        </div>
        </form>

    </div>
    <div class="col-md-2"></div>
  </div>


@stop
