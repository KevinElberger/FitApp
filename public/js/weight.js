$(document).ready(function() {
    // Disable users from creating logs in the future.
    $("#date").datepicker({
        maxDate: 0
    });

    $('.alert').delay(2000).fadeOut(300);
    // Starts graphing function for weight graphing.
    initialize();
});

function initialize() {
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

    // Start and end dates for the graph.
    var maxT = findMaxDate();
    var minT = findMinDate();

    var parseDate = d3.time.format("%m/%d/%Y").parse;

    // Initialize tip variable for tip display on dots.
    var tip = d3.tip()
        .attr('class', 'd3-tip')
        .offset([-10, 0])
        .html(function(d) {
            return "<strong>Weight:</strong> <span style='color:teal'>" + d.close + "</span>";
        });

    // Initialize the SVG graph by grabbing the visualization div.
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
        xScale = d3.time.scale().range([MARGINS.left, WIDTH - MARGINS.right]).domain([new Date(minT), new Date(maxT)]),
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
        .interpolate("cardinal")
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

// Computes the earliest date for scaling the x-axis on d3 graph.
function findMinDate() {
    var minT = arr[arr.length - 1];
    var minDate = new Date(minT[0]);
    for (var y=0; y < arr.length; y++) {
        var temp = new Date(arr[y][0]);
        if(temp < minDate) {
            minDate = temp;
        }
    }
    return minDate;
}