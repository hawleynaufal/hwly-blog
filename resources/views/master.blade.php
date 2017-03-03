<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="vendor/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/font-awesome.min.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('src/img/icon.png') }}" />
    <!--<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>-->
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script >
        tinymce.init({
          selector:'#mytextarea',
          plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
    			toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
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


        <nav class="navbar navbar-default navbar-static-top">
            <div class="" style="padding-left:150px;padding-right:150px;">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="../src/img/logo.png" alt="" width="23%">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                  <li><a href="/blog/create">Write a post</a></li>
                  @if(Auth::guest())
                    <li><a href="{{ url('/login') }}" class="a-blue">Sign In / Sign Up</a></li>
                  @else
                    <li class="dropdown">
                        <a href="#" class="a-blue dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
              <hr class="header">
            </div>
        </nav>

        @yield('content')


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
    function checkScroll(){
      var startY = $('.navbar').height() * 1; //The point where the navbar changes in px

      if($(window).scrollTop() > startY){
          $('.navbar-bwh  ').addClass("navbar-fixed-top ");
          $('.user  ').addClass("no-hidden ");
      }else{
          $('.navbar-bwh ').removeClass("navbar-fixed-top");
          $('.user  ').removeClass("no-hidden ");
      }
    }

    if($('.navbar-bwh').length > 0){
      $(window).on("scroll load resize", function(){
          checkScroll();
            });
    };
    </script>
  </body>
</html>
