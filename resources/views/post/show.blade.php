@extends('master')
@section('title','Hwly-blog ' )
@section('content')
<!--Navbar 2 -------------------------------->
        <nav class="navbar navbar-bwh one-edge-shadow" role="navigation">
          <div class="" style="padding-left:150px;padding-right:150px;">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar">
              <div class="user" style="">
                <ul class="nav navbar-nav navbar-right ">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </div>
              <form class="navbar-form navbar-right" url="" action="\" method="get" role="search">
                <div class="form-group "style="margin-top:5px;" >
                  <span class="" style="color:#777;font-size:12pt;">
                    <span class="fa fa-search" ></span>&nbsp;&nbsp;
                  </span>
                  <input type="text" name="search" placeholder="Search">
                </div>
              </form>
              <ul class="nav navbar-nav navbar-left">
                <li><a href="/">HOME</a></li>
                <li><a href="#">TRANDING</a></li>
                <li><a href="#">CATEGORY</a></li>
                <li><a href="#">ABOUT US</a></li>

              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
<!--Navbar 2 -------------------------------->
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
