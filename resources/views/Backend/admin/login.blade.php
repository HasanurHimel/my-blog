<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Himel Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/plugins/iCheck/square/blue.css">



    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

{{--<a href="{{ route('register') }}">Register</a>--}}

            <div class="login-box">
                <div class="login-logo">
                    <a href=""><b>Admin</b>Login</a>
                </div>
                <!-- /.admin-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Please sign your valid  email & Password</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> {{ $message }} !</strong>
                        </div>
                        @enderror

                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> {{ $message }} !</strong>
                        </div>
                        @enderror



                        <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="rememberMe"> Remember Me
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </form>

                {{--        <div class="social-auth-links text-center">--}}
                {{--            <p>- OR -</p>--}}
                {{--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
                {{--                Facebook</a>--}}
                {{--            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using--}}
                {{--                Google+</a>--}}
                {{--        </div>--}}
                <!-- /.social-auth-links -->


                </div>
                <!-- /.admin-box-body -->
            </div>




<!-- /.admin-box -->

<!-- jQuery 3 -->
<script src="{{ asset('/') }}backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/') }}backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ asset('/') }}backend/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
