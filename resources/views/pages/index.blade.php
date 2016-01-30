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

<div class="jumbotron container">

    <button type="button" id="addLift" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#myModal">Add Lift</button>

    <hr />



    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Add A Lift</h2>
                </div>
                <div class="modal-body">
                    <!-- Form for lift information -->
                    <form class="liftInfo" name="liftInfo">

                        <div class="form-group">
                            <label class="label" for="name">Lift Name</label><br/>
                            <input type="text" name="name" class="form-control"><br/>
                        </div>


                        <div class="form-group">
                            <label class="label" for="weight">Weight</label><br/>
                            <input type="number" name="weight" class="form-control"><br/>
                        </div>

                        <div class="form-group">
                            <label class="label" for="sets">Sets</label><br/>
                            <input type="number" name="sets" class="form-control"><br/>
                        </div>

                        <div class="form-group">
                            <label class="label" for="reps">Reps</label><br/>
                            <input type="number" name="reps" class="form-control"><br/>
                        </div>

                        <div id="dateField" class="form-group">
                            <label class="label" for="date">Date</label><br/>
                                <input id="date" placeholder="Click to show date" class="form-control"><br/>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-raised btn-primary" type="submit" value="Finish" id="submit">
                    <button type="button" class="btn btn-raised" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
    $(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
        $("#date").datepicker();
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
</style>