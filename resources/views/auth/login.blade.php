<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hwly-blog | Login</title>

    <!-- Styles -->
    <link href="vendor/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/font-awesome.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('src/img/icon.png') }}" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="container">
  <div class="text-center img-responsive" style="padding-top:20px;padding-bottom:px;">
    <img src="src/img/logo.png" alt="" width="22%">
    <hr>
  </div>
</div>

  <div class="row">
    <div class="col-md-5">
      <div class="col-md-10 col-md-push-3">
        <div class="sign text-center">Sign Up
        </div>
      </div>
      <div class="col-md-10 col-md-push-3">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="col-xs-11" style="padding-bottom:5px;">
              <div class="" style="font-size:12pt;">Name</div>
              <input id="name" type="text" class="form-control " name="name" width="20px"value="{{ old('name') }}" required>
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
            </div>
            <div class="col-xs-11" style="padding-bottom:5px;">
              <div class="" style="font-size:12pt;">Email</div>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="col-xs-11" style="padding-bottom:5px;">
              <div class="" style="font-size:12pt;">Password</div>
              <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="col-xs-11" style="padding-bottom:5px;">
                <div class="" style="font-size:12pt;">Password Confirmation</div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <div class="col-xs-11" style="padding-top:5px;">
                    <button type="submit" name="register" class="btn btn-primary btn-block">
                        Sign Up
                    </button>
              </div>
        </form>
      </div>
    </div>
    <div class="col-md-2 ">
      <center>
        <div class="vertical-line" style="height: 470px;"></div>
      </center>
    </div>
    <div class="col-md-5">
      <div class="col-md-10 col-md-pull-1">
        <div class="sign text-center">Sign In
        </div>
      </div>
      <div class="col-md-10 ">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="col-xs-11" style="padding-bottom:5px;">
                <div class="" style="font-size:12pt;color:#282828;">Email</div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>
            <div class="col-xs-11" style="padding-bottom:5px;">
                <div class="" style="font-size:12pt;">Password</div>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

            <div class="col-xs-11" style="padding-top:5px;">
              <button type="submit" name="login" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>

        </form>
      </div>
    </div>
  </div>
  <hr>
<div class="container text-center " style="color:#606061;padding-bottom:10px;">

  &copy; Copyright 2017 hwly-blog
</div>
<script src="vendor/js/app.js"></script>
</body>
</html>
