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


<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Admin</b>Password  reset</a>
    </div>
    <!-- /.admin-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Please Enter your email</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            @if(session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @error('email')
            <div class="alert alert-danger" role="alert">
                <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong> {{ $message }} !</strong>
            </div>
            @enderror

            <div class="form-group has-feedback">
                <input id="email" type="email" placeholder="enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password" type="password" placeholder="enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary btn-block btn-flat">Reset your password</button>
            </div>
        </form>

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
