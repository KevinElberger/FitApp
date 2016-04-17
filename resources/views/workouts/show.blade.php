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
    <link href="/css/responsive.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/jquery-ui.css" rel="stylesheet">
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
    <script src="/js/d3.js"></script>
    <script>
        var arr = [];
    </script>
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
@if($lift != null)
    <div id="workout"><h1>{{ ucfirst($user->name) . '\'s ' . ucfirst($lift->name) }}</h1><br /></div>
@else
    <div id="workout">
        <h1>There are no lifts of this type recorded yet!</h1>
        <a href="/workouts/create"><b>Add one here</b></a>
    </div>
@endif
<div class="jumbotron container">

    <h3>Lift Numbers</h3>
    <hr />
    @foreach($liftCollection as $l)
        <script>
            arr.push(["{{ $l->date }}", {{ $l->weight }}]);
        </script>
    @endforeach
    <div id="wrap">
        <svg id="visualization" width="600" height="400"></svg>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        // This command is used to initialize some elements and make them work properly.
        $.material.init();

    var newArr = [];
    for(var i=0; i<arr.length; i++) {
        newArr.push(arr[i]);
    }
    newArr.sort(function(a, b) {
        return Date.parse(a) - Date.parse(b);
    });
        // Start and end dates for the line graph.
        var maxT = newArr[newArr.length - 1];
        var minT = newArr[0];
        console.log(maxT[0]);
        console.log(minT[0]);

    var parseDate = d3.time.format("%m/%d/%Y").parse;

    // Initialize the SVG line graph by grabbing the visualization div.
    var vis = d3.select("#visualization"),
            WIDTH = 600,
            HEIGHT = 400,
            MARGINS = {
                top: 20,
                right: 0,
                bottom: 20,
                left: 50
            },
    // Declare the x and y scales as well as the x and y axis.
            xScale = d3.time.scale().range([MARGINS.left, WIDTH - MARGINS.right]).domain([new Date(parseDate(minT[0])), new Date(parseDate(maxT[0]))]),
            yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0,425]);
            xAxis = d3.svg.axis().scale(xScale)
                    .orient("bottom").ticks(7)
                    .tickFormat(d3.time.format("%m/%d/%Y"));
            yAxis = d3.svg.axis().scale(yScale)
                                .orient("left");

    // Orient the x and y axis to proper positions.
    vis.append("g")
            .attr("transform","translate(0," + (HEIGHT - MARGINS.bottom) + ")")
            .attr("class", "x axis")
            .call(xAxis);
    vis.append("g")
            .attr("transform", "translate(" + (MARGINS.left) + ",0)")
            .attr("class", "y axis")
            .call(yAxis);

    // Parse the array of data for dates and closes.
    var data = arr.map(function(d) {
        return {
            date: parseDate(d[0]),
            close: d[1]
        };
    });


    // Create the line for the graph.
    var line = d3.svg.line()
            .x(function(d) { return xScale(d.date); })
            .y(function(d) { return yScale(d.close); });

    // Append the line to the SVG by using the data points from the array.
    // Deprecated due to lack of animation.
//    vis.append("path")
//            .datum(data)
//            .attr("class", "line")
//            .attr("d", line);

    // Append a path for animation.
    var path = vis.append("path")
            .attr("d", line(data))
            .attr("stroke", "steelblue")
            .attr("stroke-width", "2")
            .attr("fill", "none");

    var totalLength = path.node().getTotalLength();

    // Transition (display) the path over 2 seconds.
    path
            .attr("stroke-dasharray", totalLength + " " + totalLength)
            .attr("stroke-dashoffset", totalLength)
            .transition()
            .duration(2000)
            .ease("linear")
            .attr("stroke-dashoffset", 0);
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
</style>