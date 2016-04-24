$(document).ready(function() {
    // Starts graphing function which calls statistic computation function.
    initialize();
    improvement();
    oneRepMaxCalculator();
    $('.sgraph').click(function() {
        // Swaps out different graphs based on the button being pressed.
        $('#liftGraph').fadeOut('fast', function(e){
            $('#strengthGraph').fadeIn('fast');
            deadliftStrengthGraph();
        });
    });
});

function initialize() {
    // This command is used to initialize some elements and make them work properly.
    $.material.init();

    // Used to figure out which lift needs to be strength evaluated.
    var liftType = document.getElementById('liftType').value;
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

    // Call the appropriate strength calculation method depending on lift name.
    if (liftType = "deadlift") {
        deadliftUserStrength();
    }
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

// Calculate strength of a user's deadlift.
function deadliftUserStrength() {
    // Grab a user's most recent weight, their gender and their PR.
    var weight = document.getElementById('weight').value;
    var gender = document.getElementById('gender').value;
    var personalRecord = document.getElementById('highestLift').innerHTML;
    var rankList = ["Untrained","Novice","Intermediate","Advanced","Elite"];
    var userRank = "";
    var maleWeight = [114,123,132,148,165,181,198,220,242,275,319,320];
    var maleDeadlift = [[114,95,180,205,300,385],[123,105,195,220,320,415],[132,115,210,240,340,440],
        [148,125,235,270,380,480],[165,135,255,295,410,520],[181,150,275,315,440,550],
        [198,155,290,335,460,565],[220,165,305,350,480,585],[242,170,320,365,490,595],
        [275,175,325,375,500,600],[319,180,335,380,505,610],[320,185,340,390,510,615]];

    var femaleDeadlift = [[97,55,105,120,175,230],[105,60,115,130,190,240],[114,65,120,140,200,255],
        [123,70,130,150,210,265],[132,75,135,160,220,275],[148,80,150,175,240,295],
        [165,90,160,190,260,320],[181,95,175,205,275,330],[198,100,185,215,285,350],
        [199,110,195,230,300,365]];

    // If user is male, reference male strength table.
    if (gender = "male") {
        // Set user weight to nearest weight reference.
        for (var i=0; i < maleWeight.length; i++) {
            if (weight >= maleWeight[i] && weight < maleWeight[i+1]) {
                weight = maleWeight[i];
            } else if (weight >= maleWeight[11]) {
                weight = maleWeight[11];
            }
        }
        // Compare lift to lift numbers in relative weight table.
        for (var j=0; j < maleDeadlift.length; j++) {
            if (weight == maleDeadlift[j][0]) {
                // Find rank based on number comparison.
                for (var x=1; x < 5; x++) {
                    if (personalRecord >= maleDeadlift[j][x] && personalRecord < maleDeadlift[j][x+1]) {
                        userRank = rankList[x-1];
                    }
                }
            }
        }
        document.getElementById('strengthRank').innerHTML = userRank;
        // Set smiley face according to strength rank.
        switch (userRank) {
            case "Untrained":
                document.getElementById('strengthFace').innerHTML = "sentiment_very_dissatisfied";
                break;
            case "Novice":
                document.getElementById('strengthFace').innerHTML = "sentiment_dissatisfied";
                break;
            case "Intermediate":
                document.getElementById('strengthFace').innerHTML = "sentiment_neutral";
                break;
            case "Advanced":
                document.getElementById('strengthFace').innerHTML = "sentiment_satisfied";
                break;
            case "Elite":
                document.getElementById('strengthFace').innerHTML = "sentiment_very_satisfied";
                break;
            default:
                document.getElementById('strengthFace').innerHTML = "sentiment_satisfied";
        }
    }
}

function deadliftStrengthGraph() {
    // Grab a user's most recent weight, their gender and their PR.
    var weight = document.getElementById('weight').value;
    var gender = document.getElementById('gender').value;
    var yValues = [5];
    var maleWeight = [114,123,132,148,165,181,198,220,242,275,319,320];
    var maleDeadlift = [[114,95,180,205,300,385],[123,105,195,220,320,415],[132,115,210,240,340,440],
        [148,125,235,270,380,480],[165,135,255,295,410,520],[181,150,275,315,440,550],
        [198,155,290,335,460,565],[220,165,305,350,480,585],[242,170,320,365,490,595],
        [275,175,325,375,500,600],[319,180,335,380,505,610],[320,185,340,390,510,615]];

    var femaleDeadlift = [[97,55,105,120,175,230],[105,60,115,130,190,240],[114,65,120,140,200,255],
        [123,70,130,150,210,265],[132,75,135,160,220,275],[148,80,150,175,240,295],
        [165,90,160,190,260,320],[181,95,175,205,275,330],[198,100,185,215,285,350],
        [199,110,195,230,300,365]];

    // Initialize tip variable for tip display on dots.
    var tip = d3.tip()
        .attr('class', 'd3-tip')
        .offset([-10, 0])
        .html(function(d) {
            return "<strong>Weight:</strong> <span style='color:teal'>" + d.close + "</span>";
        });

    // If user is male, reference male strength table.
    if (gender == "male") {
        // Set user weight to nearest weight reference.
        for (var i = 0; i < maleWeight.length; i++) {
            if (weight >= maleWeight[i] && weight < maleWeight[i + 1]) {
                weight = maleWeight[i];
            } else if (weight >= maleWeight[11]) {
                weight = maleWeight[11];
            }
        }
        // Compare lift to lift numbers in relative weight table.
        for (var j=0; j < maleDeadlift.length; j++) {
            if (weight == maleDeadlift[j][0]) {
                // Set all y-values to the lift numbers associated with the weight of user.
                    yValues[0] = maleDeadlift[j][1];
                    yValues[1] = maleDeadlift[j][2];
                    yValues[2] = maleDeadlift[j][3];
                    yValues[3] = maleDeadlift[j][4];
                    yValues[4] = maleDeadlift[j][5];
            }
        }

        var dataset = [
            {"lift": yValues[0], "strength": "untrained"},
            {"lift": yValues[1], "strength": "novice"},
            {"lift": yValues[2], "strength": "intermediate"},
            {"lift": yValues[3], "strength": "advanced"},
            {"lift": yValues[4], "strength": "elite"}
        ];
        // Used for path transitions.
        var dataset1 = [{"lift": yValues[0], "strength": "untrained"},{"lift": yValues[1], "strength": "novice"}];
        var dataset2 = [{"lift": yValues[1], "strength": "novice"},{"lift": yValues[2], "strength": "intermediate"}];
        var dataset3 = [{"lift": yValues[2], "strength": "intermediate"},{"lift": yValues[3], "strength": "advanced"}];
        var dataset4 = [{"lift": yValues[3], "strength": "advanced"},{"lift": yValues[4], "strength": "elite"}];

        // Initialize the SVG line graph by grabbing the visualization div.
        var vis = d3.select("#visualization2"),
            WIDTH = 500,
            HEIGHT = 400,
            MARGINS = {
                top: 20,
                right: 0,
                bottom: 20,
                left: 50
            },
        // Declare the x and y scales as well as the x and y axis.
            xScale = d3.scale.ordinal().domain(dataset.map(function (d) {return d.strength;}))
                .rangeRoundBands([MARGINS.left, WIDTH - MARGINS.right]),
            yScale = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, 650]);
        xAxis = d3.svg.axis().scale(xScale)
            .orient("bottom");
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

        // Create the line for the graph.
        var line = d3.svg.line()
            .x(function (d) {
                return xScale(d.strength);
            })
            .y(function (d) {
                return yScale(d.lift);
            });

        // Append a path for animation.
        // First path is untrained to novice.
        var path = vis.append("path")
            .attr("d", line(dataset1))
            .attr("stroke", "red")
            .attr("stroke-width", "2")
            .attr("fill", "none");

        // Novice to intermediate.
        var path2 = vis.append("path")
            .attr("d", line(dataset2))
            .attr("stroke", "steelblue")
            .attr("stroke-width", "2")
            .attr("fill", "none");

        // Intermediate to advanced.
        var path3 = vis.append("path")
            .attr("d", line(dataset3))
            .attr("stroke", "steelblue")
            .attr("stroke-width", "2")
            .attr("fill", "none");

        // Advanced to elite.
        var path4 = vis.append("path")
            .attr("d", line(dataset4))
            .attr("stroke", "green")
            .attr("stroke-width", "2")
            .attr("fill", "none");

        var totalLength = path.node().getTotalLength();

        // Transition (display) the paths over 2 seconds.
        path
            .attr("stroke-dasharray", totalLength + " " + totalLength)
            .attr("stroke-dashoffset", totalLength)
            .transition()
            .duration(1000)
            .ease("linear")
            .attr("stroke-dashoffset", 0);

        path2
            .attr("stroke-dasharray", totalLength + " " + totalLength)
            .attr("stroke-dashoffset", totalLength)
            .transition()
            .delay(1000)
            .duration(1000)
            .ease("linear")
            .attr("stroke-dashoffset", 0);

        path3
            .attr("stroke-dasharray", totalLength + " " + totalLength)
            .attr("stroke-dashoffset", totalLength)
            .transition()
            .delay(2000)
            .duration(1000)
            .ease("linear")
            .attr("stroke-dashoffset", 0);

        path4
            .attr("stroke-dasharray", totalLength + " " + totalLength)
            .attr("stroke-dashoffset", totalLength)
            .transition()
            .delay(3000)
            .duration(1000)
            .ease("linear")
            .attr("stroke-dashoffset", 0);

        // Add dots on graph for each data point.
        vis.selectAll(".dot")
            .data(dataset)
            .enter().append("circle")
            .attr("class", "dot")
            .attr("cx", line.x())
            .attr("cy", line.y())
            .attr("r", 3.5);
    }
}