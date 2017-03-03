@extends('master')


  @section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 jumbotron">
      <h1>Create Data</h1>
    <p><i>Create your own stories</i></p>
    </div>
    <div class="col-md-2"></div>
  </div>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <form class="" action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group{{($errors->has('title'))? $errors->first('title') : ''}}">
        <label>Title:</label>
        <input type="text" name="title" class="form-control" placeholder="Enter Title Here">
        {!! $errors->first('title','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group{{($errors->has('slug'))? $errors->first('title') : ''}}">
        <label>Slug:</label>
        <input type="text" name="slug" class="form-control " placeholder="Enter Slug Here" required="" minlength="5" maxlength="255" >
        {!! $errors->first('slug','<p class="help-block">:message</p>') !!}
      </div>
      <div class="form-group">
        <label for="sel1">Category :</label>
        <select class="form-control" id="sel1">
          <option>Narasi</option>
          <option>Tips</option>
          <option>Motivation</option>
          <option>Love</option>
          <option>Traveller</option>
          <option>Childhood</option>
        </select>
      </div>
      <div class="form-group">
          <label>Selecet Image to upload :</label>
          <input type="file" name="image" id="file"></input>
      </div>


      <div class="form-group{{($errors->has('description'))? $errors->first('title') : ''}}">
        <label>Description:</label>
        <input type="text" name="description" id="mytextarea" class="form-control" placeholder="Enter Description Here" >
        {!! $errors->first('description','<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group">
        <input type="submit" class='btn btn-primary' value="Save">
      </div>
      </form>

  </div>
  <div class="col-md-2">

  </div>
</div>








  @stop
