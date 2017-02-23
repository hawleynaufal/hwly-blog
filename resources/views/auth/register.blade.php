
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
          <div class="wel-sub">Join with more than 100.000 user</div>
          <div class="wel-mini-sub">Is a long established fact that a reader will be distracted by the readable content of a page whenlooking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distributionof letters, as opposed to using 'Content here, content here'
            <div style="padding-top:20px;">
              Have account ? <a href="{{ url('/login') }}">Login</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 welcome-grey" >
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="reg-jdl">
          <br>
          Create your quicker account
          </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
              <div class=""style="padding-bottom:30px;">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Name"required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"  required>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif

                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group">

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                </div>
              </div>
              <button type="submit" name="register" class="border" style="font-size:12pt;background-color:transparent;">Register</button>
          </form>
        </div>
        <div class="col-md-2"></div>
      </div>

    </div>


    <!-- Java script kiehh-->
    <script src="vendor/js/jquery.js"></script>
    <script src="vendor/js/wow.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/js/main.js"></script>
  </body>
</html>
