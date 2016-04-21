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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <div id="bg">
        <img src="img/hero-area.jpg" alt="">
    </div>
</head>
<body>
{{--<div class="content-wrap">--}}
    <div class="jumbotron">
        <div class="col-md-12">
            <div class="centered">
            {{--<div class="valign-wrapper">--}}
                <div class="text-right">
                    <h1 class="wow wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms"><b>FitApp - Track and Log Your Workouts</b></h1>
                    <p class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">WEB APP DESIGNED TO HELP YOU REACH YOUR GOALS</p>
                    @if(\Auth::guest())
                        <a href="/login" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Log In</a>
                        <a href="/register" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Sign Up</a>
                    @else
                        <a href="/workouts/index" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Home</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
{{--</div>--}}
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
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
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>
<style>
    h1 {
        color: white !important;
    }
    p {
        color: white !important;
    }
    .jumbotron {
        text-align: right;
    }
    .text-right {
        position: relative;
        top: 60%;
        -webkit-transform: translateY(60%);
        -ms-transform: translateY(60%);
        transform: translateY(60%);
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
