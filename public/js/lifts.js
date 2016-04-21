$(document).ready(function() {
    // Starts graphing function which calls statistic computation function.
    initialize();
    improvement();
    oneRepMaxCalculator();
});

function initialize() {
    // This command is used to initialize some elements and make them work properly.
    $.material.init();

    var newArr = [];
    for(var i=0; i<arr.length; i++) {
        newArr.push(arr[i]);
    }
    // Sort the array's dates in order from oldest to newest.
    newArr.sort(function(a, b) {
        return Date.parse(a) - Date.parse(b);
    });
    for (var x=0; x<newArr.length;x++) {
        newArr.sort(newArr[x],newArr[x+1]);
    }

    // Start and end dates for the line graph.
    var maxT = findMaxDate();
    var minT = newArr[0];

    // If no entries are written, call liftRecords to append innerHTML for stats.
    if(minT == null) {
        liftRecords();
    }

    var parseDate = d3.time.format("%m/%d/%Y").parse;

    // Initialize tip variable for tip display on dots.
    var tip = d3.tip()
        .attr('class', 'd3-tip')
        .offset([-10, 0])
        .html(function(d) {
            return "<strong>Weight:</strong> <span style='color:teal'>" + d.close + "</span>";
        });

    // Initialize the SVG line graph by grabbing the visualization div.
    var vis = d3.select("#visualization"),
        WIDTH = 500,
        HEIGHT = 400,
        MARGINS = {
            top: 20,
            right: 0,
            bottom: 20,
            left: 50
        },
    // Declare the x and y scales as well as the x and y axis.
        xScale = d3.time.scale().range([MARGINS.left, WIDTH - MARGINS.right]).domain([new Date(minT[0]), new Date(maxT)]),
        yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, 425]);
    xAxis = d3.svg.axis().scale(xScale)
        .orient("bottom").ticks(5)
        .tickFormat(d3.time.format("%m/%Y"));
    yAxis = d3.svg.axis().scale(yScale)
        .orient("left");


    // Orient the x and y axis to proper positions.
    vis.append("g")
        .attr("transform", "translate(0," + (HEIGHT - MARGINS.bottom) + ")")
        .attr("class", "x axis")
        .call(xAxis);
    vis.append("g")
        .attr("transform", "translate(" + (MARGINS.left) + ",0)")
        .attr("class", "y axis")
        .call(yAxis);

    vis.call(tip);

    // Parse the array of data for dates and closes.
    var data = newArr.map(function (d) {
        return {
            date: parseDate(d[0]),
            close: d[1]
        };
    });

    // Create the line for the graph.
    var line = d3.svg.line()
        .x(function (d) {
            return xScale(d.date);
        })
        .y(function (d) {
            return yScale(d.close);
        });

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

    // Add dots on graph for each data point.
    vis.selectAll(".dot")
        .data(data)
        .enter().append("circle")
        .attr("class", "dot")
        .attr("cx", line.x())
        .attr("cy", line.y())
        .attr("r", 3.5)
        .on('mouseover', tip.show)
        .on('mouseout', tip.hide);
    liftRecords();
}

// Computes lifting records from given data to append to highest record on page.
function liftRecords() {
    var highestLift = 0;
    var highestDay;
    for(var i=0; i < arr.length; i++) {
        if(arr[i][1] > highestLift) {
            highestLift = arr[i][1];
            highestDay = arr[i][0];
        }
    }
    if(highestLift > 0) {
        document.getElementById('highestLift').innerHTML = highestLift.toString();
        document.getElementById('highestDay').innerHTML = highestDay;
    } else {
        document.getElementById('highestLift').innerHTML = "No recorded lifts!";
        document.getElementById('highestDay').innerHTML = "No recorded dates!";
    }
}

// Computes the most recent date for scaling X-axis on d3 graph.
function findMaxDate() {
    var maxT = arr[arr.length - 1];
    var maxDate = new Date(maxT[0]);
    for (var x=0; x < arr.length; x++) {
        var temp = new Date(arr[x][0]);
        if (temp > maxDate) {
            maxDate = temp;
        }
    }
    return maxDate;
}

// Calculates how much a given lift has increased by over time.
function improvement() {
    var lowestLift = arr[0][1];
    var highestLift = 0;
    var difference;
    for (var i=0; i < arr.length; i++) {
        if(arr[i][1] > highestLift) {
            highestLift = arr[i][1];
        }
        if(arr[i][1] < lowestLift) {
            lowestLift = arr[i][1];
        }
    }
    difference = highestLift - lowestLift;
    if (highestLift > 0) {
        document.getElementById('improvement').innerHTML = difference + " pounds!";
    }
}

// Calculates a person's one rep max given their PR and reps.
function oneRepMaxCalculator() {
    // Initialize all variables
    var highestLift = 0;
    var reps = 0;
    for(var i=0; i < repArr.length; i++) {
        if(repArr[i][0] > highestLift) {
            highestLift = repArr[i][0];
            reps = repArr[i][1];
        }
    }
    var formula = (reps / 30) + 1;
    formula = (formula * highestLift).toFixed(0);
    document.getElementById('orm').innerHTML = formula.toString() + " pounds!";
}