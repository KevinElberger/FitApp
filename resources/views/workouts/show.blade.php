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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <!-- stylesheet for tip display-->
    <link rel="stylesheet" href="//rawgithub.com/Caged/d3-tip/master/examples/example-styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
    <script>
        var arr = [];
        var repArr = [];
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
@if(!empty($liftCollection->first()))
    @if(!empty($lift))
    <div id="workout"><h1>{{ ucfirst($user->name) . '\'s ' . ucfirst($lift->name) }}</h1><br /></div>


    <div class="jumbotron container">
        <h3>Lift Numbers</h3>
        <hr />
        @foreach($liftCollection as $l)
            @if($l->name == $lift->name)
            <script>
                arr.push(["{{ Carbon\Carbon::parse($l->date)->format('m/d/Y') }}", {{ $l->weight }}]);
                repArr.push([{{$l->weight}},{{$l->reps}}]);
            </script>
            @endif
        @endforeach
        <div id="wrap">
            <svg id="visualization" width="600" height="400"></svg>
        </div>
        <br />
    </div>
    <div id="weightOfUser">
        <input type="hidden" id="weight" value="{{$userWeight->weight}}">
    </div>
    <div id="genderOfUser">
        <input type="hidden" id="gender" value="{{$user->gender}}">
    </div>
    <div id="typeOfLift">
        <input type="hidden" id="liftType" value="{{$lift->name}}">
    </div>
    <div class="jumbotron container">
        <h2>Statistics</h2>
        <hr />
        <div class="row">
            <h4>Highest Lift</h4>
            <div class="col s6">
                <i class="large material-icons">trending_up</i><h5>Personal Record</h5><br />
                <p class="flow-text" id="highestLift"></p>
            </div>
            <div class="col s6">
                <i class="large material-icons">today</i><h5>Achieved On</h5><br />
                <p class="flow-text" id="highestDay"></p>
            </div>
            <div class="col s12">
                <hr />
                <h4>Lift Progress</h4>
                <i class="large material-icons">assessment</i><h5>You've Improved By</h5><br />
                <p class="flow-text" id="improvement"></p>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <h4>One Rep Max</h4>
                <i class="large material-icons">fitness_center</i><h5>1RM from PR and Reps</h5><br />
                <p class="flow-text" id="orm"></p>
            </div>
            <div class="col s6">
                <h4>Strength Level</h4>
                <i class="large material-icons" id="strengthFace"></i><h5>Your Strength Level is</h5><br />
                <p class="flow-text" id="strengthRank"></p>
            </div>
        </div>
    </div>
    </div>
    @else
        <div id="workout">
            <h1>There are no lifts of this type recorded yet!</h1>
            <a href="/workouts/create" class="btn btn-raised btn-primary"><b>Add one here</b></a>
        </div>
    @endif
@else
    <div id="workout">
        <h1>There are no lifts of this type recorded yet!</h1>
        <a href="/workouts/create" class="btn btn-raised btn-primary"><b>Add one here</b></a>
    </div>
@endif
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/jquery.mmenu.min.all.js"></script>
<script src="/js/jquery.inview.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="//d3js.org/d3.v3.min.js"></script>
<script src="/js/index.js"></script>
<script src="/js/lifts.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/jquery.nav.js"></script>
<script src="/js/smooth-on-scroll.js"></script>
<script src="/js/smooth-scroll.js"></script>
</body>
</html>
<style>
    a:hover {
        color: white;
    }
    #addLift {
        display: block;
        margin: 0 auto;
    }

    #workout {
        text-align: center;
    }
    .modal-title {
        text-align: center;
    }

    .container {
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

    .line {
        fill: none;
        stroke: steelblue;
        stroke-width: 1px;
    }
    .dot {
        fill: white;
        stroke: steelblue;
        stroke-width: 1.5px;
    }
</style>