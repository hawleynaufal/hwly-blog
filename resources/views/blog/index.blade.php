@extends('master')
  @section('content')
  <div class="form-group row add">
    <div class="col-md-6">
      <h1>Postingan</h1>
    </div>
    <div class="col-md-6">
      <form class="navbar-form navbar-left" url="blog" action="\blog" method="get" role="search">
            <div class="input-group">
          <input type="text" name="search" class="form-control"placeholder="search ..." >
          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              search
            </button>
          </span>
          </div>
        </form>

    </div>
  </div>

  </form>
  <div class="row">
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
      <a href="{{ route('blog.create')}}" class="btn btn-info pull-right">Create New Data</a><br><br>
      <?php $no=1; ?>
      @foreach($post as $blog)
      <tr>
        <td width="5%">{{$no++}}</td>
        <td width="20%">{{$blog->title}}</td>
        <td width="20%">{{$blog->slug}}</td>
        <td width="40%">{!! str_limit($blog->description, $limit= 100 , $end= '......')!!}</td>

<!--{!!$blog->description!!}-->
        <td width="15%">
          <form class="" action="{{ route('blog.destroy',$blog->id ) }}" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a href="{{ route('blog.edit',$blog->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
            <a href="post/{{ $blog->slug }} "class="btn btn-default">View</a>
            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this ?');" name="name" value="delete">
          </form>
          @endforeach

        </td>
      </tr>
    </table>
    {{$post->links()}}


  </div>


  @stop
