@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="jdl page-header">{{$data->title}}</div>
      <div class="isi">
        {!!$data->description!!}
      </div>
      <hr>
    </div>
    <div class="col-md-2"></div>
  </div>
@stop
