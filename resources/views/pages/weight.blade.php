<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>FitApp - Track and Log Your Workouts</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="/css/material.min.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">
    {{--<link href="{{URL::asset('css/main.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
</head>

<body>
<nav>
    <div class="nav-wrapper teal">
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="/workouts/index">Workouts</a></li>
            <li><a href="/pages/weight">Weight</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="/logout">Logout</a></li>
        </ul>
    </div>
</nav>
<div id="workout"><h1>Set Your Weight</h1><br/></div>

<div class="jumbotron container">
    {{  Form::open(array('url' => '/pages/weight', 'method' => 'PATCH')) }}
        <div class="form-group">
            {{ Form::label('weight', 'Current Weight') }}
            {{ Form::number('weight', $user['weight'], ['class' => 'form-control']) }}
        </div>
    {{ Form::submit('Finish', ['class' => 'btn btn-raised btn-primary']) }}
    {{ Form::close() }}
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

<style>
    a:hover {
        color: white;
    }
    .jumbotron {
        text-align: center;
    }
    #workout {
        text-align: center;
    }
</style>