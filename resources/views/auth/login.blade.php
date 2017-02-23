<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quicker | More Faster Than Anything</title>
    <link rel="stylesheet" href="vendor/css/animate.css">
    <link rel="stylesheet" href="vendor/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="icon" href="src/img/icon.png">
  </head>
  <body>
    <div class="row">
      <div class="col-md-7 welcome" >
        <div class="" style="padding-top:50px;padding-left:30px;">
          <img src="src/img/logo-white.png" width="160">
        </div>
        <div class="pad-isi" style="padding-left:100px;padding-right:50px;padding-bottom:100px;">
          <div class="wel-jdl">Welcome</div>
          <div class="wel-sub">Create your quicker account here</div>
          <div class="wel-mini-sub">Is a long established fact that a reader will be distracted by the readable content of a page whenlooking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distributionof letters, as opposed to using 'Content here, content here'</div>
          <a href="{{url('/register')}}"><span class="border-white">REGISTER</span></a>
        </div>
      </div>
      <div class="col-md-5 welcome-grey" >
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="log-jdl">
          Or<br>
          Login with you quicker account
          </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}
              <div class=""style="padding-bottom:30px;">
                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"  required autofocus>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif

                <input id="password" type="password" class="form-control" placeholder="Password"name="password" required>

                    @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif

              </div>
              <button type="submit" name="login" class="border" style="font-size:12pt;background-color:transparent;">Login</button>
          </form>
        </div>
        <div class="col-md-2"></div>
      </div>

    </div>


    <!-- Java script kiehh -->
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/wow.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/main.js"></script>
  </body>
</html>
