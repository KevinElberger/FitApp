<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Responsive Bootstrap Landing Page Template">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>FitApp - Track and Log Your Workouts</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-wrap">
        <header class="hero-area" id="login">
            <div id="logo" class="logo">
                <h1 class="section-title wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="100ms"><b>FitApp</b></h1>
            </div>

            <div class="container-fluid">
                <div id="name">
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <br />
                            <div class="panel-body">

                                <form class="form-horizontal wow fadeInRight" role="form" method="POST" action="{{ url('/auth/login') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">Login</button>

                                            <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

    </div>




    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    html {
    background: url(img/hero-area.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }

    .logo {
        text-align: center;
    }
</style>