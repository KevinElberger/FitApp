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
    <link href="/css/ripples.min.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    {{--<link href="/css/jquery-ui.css" rel="stylesheet">--}}
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

<div id="workout"><h1>{{ ucfirst($user->name) }}'s Workouts</h1><br /></div>
<div class="jumbotron container">
    @include('flash::message')
    <a href="/workouts/create" class="btn btn-raised btn-primary">Add Lift Record</a>

    <hr />

    <div class="card blue-grey darken-1">
        <div class="card-action waves-effect waves-block waves-light">
            <span class="card-title"><a href="/workouts/{{ $user->name }}/bench">Bench</a></span>
        </div>
    </div><br/>
    <div class="card blue-grey darken-1">
        <div class="card-action waves-effect waves-block waves-light">
            <span class="card-title"><a href="/workouts/{{ $user->name }}/deadlift">Deadlift</a></span>
        </div>
    </div><br/>
    <div class="card blue-grey darken-1">
        <div class="card-action waves-effect waves-block waves-light">
            <span class="card-title"><a href="/workouts/{{ $user->name }}/squat">Squat</a></span>
        </div>
    </div>
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/jquery.mmenu.min.all.js"></script>
<script src="/js/jquery.inview.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/wow.js"></script>
<script src="/js/count-to.js"></script>
<script src="/js/main.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/jquery.nav.js"></script>
<script src="/js/smooth-on-scroll.js"></script>
<script src="/js/smooth-scroll.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<script type="text/javascript">
    $(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
        $(".alert").delay(2000).fadeOut(300);
    }());
</script>
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
</style>