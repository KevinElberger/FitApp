@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>FitApp - Track and Log Your Workouts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <div id="bg">
        <img src="img/hero-area.jpg" alt="">
    </div>
</head>

<body>

<div class="content-wrap">
    <header class="hero-area" id="login">
        <div class="container-fluid">
            <div class="col-md-4 col-md-offset-4">
                <h1><b>Login</b></h1>
                <div class="panel panel-default">
                    <br />
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i>Login
                                    </button>

                                    {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ripples.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.mmenu.min.all.js"></script>
    <script src="js/count-to.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/smooth-on-scroll.js"></script>
    <script src="js/smooth-scroll.js"></script>


    <script>
        $(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();

        }());
    </script>

</body>

</html>

<style>
    h1 {
        text-align: center;
    }
    .panel-body {
    }
    #logo {
        text-align: center;
    }
    #bg {
        position: fixed;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
    }
    #bg img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        min-width: 50%;
        min-height: 50%;
    }
</style>
@endsection
