<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>FitApp - Track and Log Your Workouts</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="{{URL::asset('css/material.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/ripples.min.css')}}" rel="stylesheet">
    {{--<link href="{{URL::asset('css/main.css')}}" rel="stylesheet">--}}
    <link href="{{URL::asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/jquery-ui.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.mmenu.min.all.js')}}"></script>
    <script src="{{URL::asset('js/jquery.inview.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/ripples.min.js')}}"></script>
    <script src="{{URL::asset('js/material.min.js')}}"></script>
    <script src="{{URL::asset('js/wow.js')}}"></script>
    <script src="{{URL::asset('js/count-to.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/classie.js')}}"></script>
    <script src="{{URL::asset('js/jquery.nav.js')}}"></script>
    <script src="{{URL::asset('js/smooth-on-scroll.js')}}"></script>
    <script src="{{URL::asset('js/smooth-scroll.js')}}"></script>

</head>

<body>
<nav class="navbar navbar-default">
    <a class="navbar-brand logo-right" href="#"><i class="mdi-image-timelapse"></i><b>FitApp</b></a>
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="/workouts/index">Workouts</a></li>
                <li><a href="/pages/weight">Weight</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout">Logout</a></li>
            </div>
        </div>
    </div>
</nav>
<div id="workout"><h1>{{ ucfirst($user->name) }}'s Weight</h1><br/></div>

<div class="jumbotron container">

</div>


</body>
</html>

<style>
    .jumbotron {
        text-align: center;
    }
    #workout {
        text-align: center;
    }
</style>