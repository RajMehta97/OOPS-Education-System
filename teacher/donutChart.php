<?php

    include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="build/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
    <script src="../build/nv.d3.js"></script>
    <script src="lib/stream_layers.js"></script>

    <style>
        text {
            font: 12px sans-serif;
        }

        svg {
            display: block;
            float: left;
        }
        #test2 {
            height: 350px !important;
            width: 350px !important;
        }
        #test1 {
            height: 350px !important;
            width: 350px !important;
        }

        html, body {
            margin: 0px;
            padding: 0px;
            height: 100%;
            width: 100%;
        }

        .nvd3.nv-pie.nv-chart-donut2 .nv-pie-title {
            fill: rgba(70, 107, 168, 0.78);
        }

        .nvd3.nv-pie.nv-chart-donut1 .nv-pie-title {
            opacity: 0.4;
            fill: rgba(224, 116, 76, 0.91);
        }

    </style>
</head>
<body class='with-3d-shadow with-transitions'>

<svg id="test1" class="mypiechart"></svg>

<svg id="test2" class="mypiechart"></svg>

<?php  $score1=5;
      $score2=3;
      $score3=4;
      $score4=3;

     $sql="SELECT  AVG(score) as avg from results where subject='1';";
        $result = $conn->query($sql);
        if($result->num_rows > 0){

        $row = $result->fetch_assoc();
            $score1=$row['avg'];
          }



        $sql="SELECT  AVG(score) as avg from results where subject='2';";
        $result = $conn->query($sql);
        if($result->num_rows>0){

        $row = $result->fetch_assoc();
            $score2=$row['avg'];
          }


          $sql="SELECT  AVG(score) as avg from results where subject='3';";
              $result = $conn->query($sql);
            if($result->num_rows >0){

            $row = $result->fetch_assoc();
                $score3=$row['avg'];
              }

            $sql="SELECT  AVG(score) as avg from results where subject='4';";
              $result = $conn->query($sql);
              if($result->num_rows>0){

              $row = $result->fetch_assoc();
                  $score4=$row['avg'];
                }

      ?>

<script>

    var testdata = [
        {key: "One", y: <?php echo htmlspecialchars($score1);?>},
        {key: "Two", y: <?php echo htmlspecialchars($score2);?>},
        {key: "Three", y: <?php echo htmlspecialchars($score3);?>},
        {key: "Four", y: <?php echo htmlspecialchars($score4);?>},

    ];

    var height = 350;
    var width = 350;

    var chart1;
    nv.addGraph(function() {
        var chart1 = nv.models.pieChart()
            .x(function(d) { return d.key })
            .y(function(d) { return d.y })
            .donut(true)
            .width(width)
            .height(height)
            .padAngle(.08)
            .cornerRadius(5)
            .id('donut1'); // allow custom CSS for this one svg

        chart1.title("Average Score");
        chart1.pie.labelsOutside(true).donut(true);

        d3.select("#test1")
            .datum(testdata)
            .transition().duration(1200)
            .call(chart1);

        // LISTEN TO WINDOW RESIZE
        // nv.utils.windowResize(chart1.update);

        // LISTEN TO CLICK EVENTS ON SLICES OF THE PIE/DONUT
        // chart.pie.dispatch.on('elementClick', function() {
        //     code...
        // });

        // chart.pie.dispatch.on('chartClick', function() {
        //     code...
        // });

        // LISTEN TO DOUBLECLICK EVENTS ON SLICES OF THE PIE/DONUT
        // chart.pie.dispatch.on('elementDblClick', function() {
        //     code...
        // });

        // LISTEN TO THE renderEnd EVENT OF THE PIE/DONUT
        // chart.pie.dispatch.on('renderEnd', function() {
        //     code...
        // });

        // OTHER EVENTS DISPATCHED BY THE PIE INCLUDE: elementMouseover, elementMouseout, elementMousemove
        // @see nv.models.pie

        return chart1;

    });



</script>
</body>
</html>
