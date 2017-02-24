<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script >
        tinymce.init({
          selector:'#mytextarea',
          plugins:'link code',
          menubar: false
        });

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <style >
    .jdl{
        text-align: center;
        font-size: 30pt;
        padding-bottom: 10pt;

        font-family: roboto;
        color: rgb(46, 46, 46);

    }
    .isi{
      font-size: 12pt;
      padding-bottom: 10pt;
      font-family: roboto;
      color: rgb(46, 46, 46);
    }
  </style>

  <body>

  <nav class="navbar navbar-default" role="navigation">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Blog Gue</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          @if (Route::has('login'))
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}">Login</a></li>
          @else
          {{ Auth::user()->name }}
              <li>

                  <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>


          @endif
          @endif

        </ul>
      </div><!-- /.navbar-collapse -->
    <!-- /.container-fluid -->
    </div>
    <div class="col-md-1">
    </div>
  </nav>


    <div class="container">
      <div class="row">
        @yield('content')
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  </body>
</html>
