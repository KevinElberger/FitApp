<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>FitApp - Track and Log Your Workouts</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="{{URL::asset('css/material.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ripples.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet">

    <div id="bg">
        <img src="{{URL::asset('img/hero-area.jpg')}}" alt="">
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
{{--                            @include('errors.list')--}}
                            {{--Login Form Starts Here--}}
                            <form class="form-horizontal wow fadeInRight" id="loginForm" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address </label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>




    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/ripples.min.js')}}"></script>
    <script src="{{URL::asset('js/material.min.js')}}"></script>
    <script src="{{URL::asset('js/wow.js')}}"></script>
    <script src="{{URL::asset('js/jquery.mmenu.min.all.js')}}"></script>
    <script src="{{URL::asset('js/count-to.js')}}"></script>
    <script src="{{URL::asset('js/jquery.inview.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/classie.js')}}"></script>
    <script src="{{URL::asset('js/jquery.nav.js')}}"></script>
    <script src="{{URL::asset('js/smooth-on-scroll.js')}}"></script>
    <script src="{{URL::asset('js/smooth-scroll.js')}}"></script>


    <script>
        $(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
//            $('.alert').delay(2000).fadeOut(300);
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