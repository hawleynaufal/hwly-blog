@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="jdl page-header">{{$data->title}}</div>
      <center>
        <img src="{{ asset('images/post/'. $data->image)}}" width="300px;">
      </center>
      <div class="isi">
        {!!$data->description!!}
      </div>
      {{$create_post}}
      <hr>
      <h3>{{$data->comments()->count()}} Comments</h3>
        <?php $i=0; ?>
        @foreach($data->comments as $comment)
          <div class="comment">
            <p><h4>{{ $comment->name }}</h4></p>
            <p><small>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</small></p>
            <p><strong>Comment:</strong><br/>{{ $comment->comment }}</p><br>
          </div>
          <?php $i++;
          if($i==3) break;?>
        @endforeach
      <hr>
      @if(Auth::check())
        {{Form::open (['route'=>['comments.store' , $data->id , 'method'=>'POST']]) }}
        <div class="row">
        <div class="row">
          <div class="col-md-12">
            <textarea class="form-control" rows="3" name="comment"style="min-width: 100%"></textarea><br />
            <input type="submit" name="Add Comment" value="Comment"class="btn btn-default">
          </div>
        </div>
      @else
        {{Form::open (['route'=>['comments.store' , $data->id , 'method'=>'POST']]) }}
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="name...">
          </div>
          <div class="col-md-6">
            <input type="text" name="email" class="form-control" placeholder="email...">
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-12">
            <textarea class="form-control" rows="3" name="comment"style="min-width: 100%"></textarea><br>
            <input type="submit" name="Add Comment" value="Comment"class="btn btn-default">
          </div>
        </div>
      {{Form::close()}}
      @endif

    </div>
    <div class="col-md-2"></div>
  </div>
@stop
