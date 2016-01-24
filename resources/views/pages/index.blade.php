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

</head>

<body>
<nav class="navbar navbar-default">
    <a class="navbar-brand logo-right" href="#"><i class="mdi-image-timelapse"></i><b>FitApp</b></a>
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Home</a></li>
                <li><a href="">Workouts</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <li><a href="/auth/logout">Logout</a></li>
            </div>
        </div>
    </div>
</nav>

<div id="workout"><h1>{{ ucfirst($user) }}'s Workouts</h1><br /></div>

<div id="content">

    <button type="button" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#myModal">Add Workout</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add A Workout</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

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
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>

</body>

</html>

<style>
    #workout {
        text-align: center;
    }
</style>