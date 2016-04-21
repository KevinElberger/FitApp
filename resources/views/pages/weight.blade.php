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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <!-- stylesheet for tip display-->
    <link rel="stylesheet" href="//rawgithub.com/Caged/d3-tip/master/examples/example-styles.css">
    <link href="/css/ripples.min.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script>
        var arr = [];
    </script>
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
@if($lift != null)
<div id="workout"><h1>Set Your Weight</h1><br/></div>
<div class="jumbotron container">
    {{  Form::open(array('url' => '/pages/weight', 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('weight', 'Current Weight') }}
            {{ Form::number('weight', $weight->weight, ['class' => 'form-control']) }}
        </div>
        <div id="dateField" class="form-group">
            {{ Form::label('date', 'Date:') }}
            {{ Form::text('date', '', ['class' => 'form-control']) }}
        </div>
    {{ Form::submit('Finish', ['class' => 'btn btn-raised btn-primary']) }}
    {{ Form::close() }}
</div>
<div class="jumbotron container">
    <h2>Weight Graph</h2>
    <hr />
    @foreach($weightCollection as $w)
        <script>
            arr.push(["{{ Carbon\Carbon::parse($w->date)->format('m/d/Y') }}", {{ $w->weight }}]);
        </script>
    @endforeach
    <div id="wrap">
        <svg id="visualization" width="600" height="400"></svg>
    </div>
    <br />
</div>
@else
    <div id="workout"><h1>Set Your Weight</h1><br/></div>
    <div class="jumbotron container">
        {{  Form::open(array('url' => '/pages/weight', 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('weight', 'Current Weight') }}
        {{ Form::number('weight', null, ['class' => 'form-control']) }}
    </div>
    <div id="dateField" class="form-group">
        {{ Form::label('date', 'Date:') }}
        {{ Form::text('date', '', ['class' => 'form-control']) }}
    </div>
    {{ Form::submit('Finish', ['class' => 'btn btn-raised btn-primary']) }}
        {{ Form::close() }}
    </div>
@endif
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/jquery.mmenu.min.all.js"></script>
<script src="/js/jquery.inview.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="//d3js.org/d3.v3.min.js"></script>
<script src="/js/index.js"></script>
<script src="/js/weight.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/count-to.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/jquery.nav.js"></script>
<script src="/js/smooth-on-scroll.js"></script>
<script src="/js/smooth-scroll.js"></script>
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
    .axis path, .axis line {
        fill: none;
        stroke: #009688;
        stroke-width: 2px;
        shape-rendering: crispEdges;
    }
    .axis text {
        font-family: sans-serif;
        font-size: 11px;
    }
    .dot {
        fill: white;
        stroke: steelblue;
        stroke-width: 1.5px;
    }
</style>