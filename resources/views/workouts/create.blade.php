<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>FitApp - Track and Log Your Workouts</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    {{--<link href="{{URL::asset('css/main.css')}}" rel="stylesheet">--}}
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.mmenu.min.all.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ripples.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/count-to.js"></script>
    <script src="js/main.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/smooth-on-scroll.js"></script>
    <script src="js/smooth-scroll.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <a class="navbar-brand logo-right" href="#"><i class="mdi-image-timelapse"></i><b>FitApp</b></a>
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="/workouts/index">Workouts</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <li><a href="/logout">Logout</a></li>
            </div>
        </div>
    </div>
</nav>

<div id="workout"><h1>Add A Lift</h1><br /></div>

<div class="jumbotron container">

        <!-- Form for lift information -->
        {{  Form::open(array('url' => '/workouts/create', 'method' => 'POST')) }}
    @include('partials.flash')
            @include('errors.list')
            <div class="form-group">
                {{ Form::label('name', 'Lift Name:') }}
                <div class="radio radio-primary">
                    <label>
                        <input name="name" id="bench" value="bench" checked="" type="radio" />
                        Bench
                    </label>
                </div>
                <div class="radio radio-primary">
                    <label>
                        <input name="name" id="deadlift" value="deadlift" type="radio" />
                        Deadlift
                    </label>
                </div>
                <div class="radio radio-primary">
                    <label>
                        <input name="name" id="squat" value="squat" type="radio" />
                        Squat
                    </label>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('weight', 'Weight:') }}
                {{ Form::number('weight', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('sets', 'Sets:') }}
                {{ Form::number('sets', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('reps', 'Reps:') }}
                {{ Form::number('reps', null, ['class' => 'form-control']) }}
            </div>

            <div id="dateField" class="form-group">
                {{ Form::label('date', 'Date:') }}
                {{ Form::text('date', '', ['class' => 'form-control']) }}
            </div>

            <div id="wrap">
                <div class="form-group">
                    {{ Form::submit('Finish', ['class' => 'btn btn-raised btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
</div>




<script type="text/javascript">
    $(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
        $("#date").datepicker({
            minDate: 0
        });

        $('.alert').delay(2000).fadeOut(300);
    }());
</script>

</body>

</html>

<style>
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

    #wrap {
        text-align: center;
    }
</style>