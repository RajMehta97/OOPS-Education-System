<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />

    <link href="build/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
    <script src="build/nv.d3.js"></script>
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

    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Elearning Teacher - Dashboard</title>
    <!--easy pie chart-->
    <link href="js/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />

    <!--vector maps -->
    <link rel="stylesheet" href="js/vector-map/jquery-jvectormap-1.1.1.css">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--jquery-ui-->
    <link href="js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!--iCheck-->
    <link href="js/icheck/skins/all.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">


    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/e5e07c439b.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sticky-header">

    <section>

        <!--Side Navigation Bar Starts-->
        <?php include 'common/sideNav.php'; ?>
        <!--Side Navigation Bar Ends-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
            <?php include 'common/header.php'; ?>
            <!-- header section end-->


            <!-- page head start-->
            <div class="page-head">
                <h3>
                    PORTAL SUMMARY
                </h3>
				<?php

	// Some Report Generation Queries
					$sql="SELECT count(*) as res from members WHERE type='Student';";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$student=$row['res'];

          $sql="SELECT count(*) as res from members WHERE type='professor';";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$teacher=$row['res'];


          $score1=5;
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

            $sql="SELECT  AVG(score) as avg from results where subject='3';";
              $result = $conn->query($sql);
              if($result->num_rows>0){

              $row = $result->fetch_assoc();
                  $score4=$row['avg'];
                }

					/*$sql="SELECT no_of_rooms from room WHERE room_type='Premium';";
          $result = $conn->query($sql);
					$row = $result->fetch_assoc();
          $premium=$row['no_of_rooms'];
					$sql="SELECT no_of_rooms from room WHERE room_type='Executive';";
          $result = $conn->query($sql);
					$row = $result->fetch_assoc();
          $executive=$row['no_of_rooms'];
					$total_rooms=$standard+$premium+$executive;

					$sql="SELECT count(*) as bookings from booking;";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $bookings=$row['bookings'];

					$sql="SELECT sum(price_paid) as revenue from booking;";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$revenue=$row['revenue'];

					$sql="SELECT sum(price_paid) as revenue from booking WHERE room_type='Standard';";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$std_revenue=$row['revenue'];


					$sql="SELECT count(*) as enquiry from enquiry;";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$enquiry=$row['enquiry'];
					$ratio=intval(($bookings/$enquiry)*100);

					$sql="SELECT sum(price_paid) as revenue from booking WHERE room_type='Premium';";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$pre_revenue=$row['revenue'];

					$sql="SELECT sum(price_paid) as revenue from booking WHERE room_type='Executive';";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$exe_revenue=$row['revenue'];

					$curr_date=date("Y-m-d");
					$prev_date= date("y-m-d",strtotime("-1 month"));
					$sql="SELECT sum(price_paid) as revenue from booking WHERE checkin >= '$prev_date' AND checkin <= '$curr_date'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result);
					$monthly_revenue=$row['revenue'];



					if(@$_POST['action']=="ADD"){
						$uname=@$_POST['uname'];
						$password=@$_POST['password'];
						if(!empty($uname) &&!empty($password)){
						$query="INSERT INTO `administration`(`admin_id`, `username`, `password`) VALUES ('','$uname','$password');";
						$res=mysqli_query($conn,$query);
						}
					}
					if(@$_POST['action']=="REMOVE"){
						$uname=@$_POST['uname'];
						$password=@$_POST['password'];
						if(!empty($uname) &&!empty($password)){
						$query="DELETE from `administration` WHERE username='$uname' AND password='$password';";
						$res=mysqli_query($conn,$query);
						}
					}*/
				?>
                <span class="sub-title">Welcome to Teachers Dashboard</span>
                <!--<div class="state-information">
                    <div class="state-graph">
                        <div id="balance" class="chart"></div>
                        <div class="info">Total Revenue <?php //echo htmlspecialchars($revenue)?></div>
                    </div>
                    <div class="state-graph">
                        <div id="item-sold" class="chart"></div>
                        <div class="info">Total Bookings <?php //echo htmlspecialchars($bookings)?></div>
                    </div>
                </div>
            </div>-->
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel purple">
                            <div class="symbol">
                                <i class="fa fa-send"></i>
                            </div>
                            <div class="value white">
                                <h1 class="timer" data-from="0" data-to="<?php echo htmlspecialchars($student);?>"
                                    data-speed="1100">
                                </h1>
                                <p>Number of Students</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel ">
                            <div class="symbol purple-color">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="value gray">
                                <h1 class="purple-color timer" data-from="0" data-to="<?php echo htmlspecialchars($teacher);?>"
                                    data-speed="1100">
                                </h1>
                                <p>Number of Teachers</p>
                            </div>
                        </section>
                    </div>
                   <div class="col-lg-3 col-sm-6">
                        <section class="panel green">
                            <div class="symbol ">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div class="value white">
                              <h3><a href="modify.php">Add Topic </a>
                              </h3>
                                <p>  <a href="#codes">View Subjects and Code </a></p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol green-color">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="value gray">
                                <h3><a href="modify0.php">Add Quizzes </a>
                                </h3>
                                <p><a href="#codes">View Subjects and Code </a></p>
                            </div>
                        </section>
                    </div>
                </div>
                <!--state overview end-->




                <div class="row">
                    <div class="col-md-8">
                        <section class="panel">
                            <header class="panel-heading">
                                Earning Graph
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <svg id="test1" class="mypiechart"></svg>
                            <div class="panel-body">
                                <!--<a href="donutChart.php">DonutCharts</a>-->
                              <div class='with-3d-shadow with-transitions'>

                              <script>

                                  var testdata = [
                                      {key: "Maths", y: <?php echo htmlspecialchars($score1);?>},
                                      {key: "Computer Science", y: <?php echo htmlspecialchars($score2);?>},
                                      {key: "Chemistry", y: <?php echo htmlspecialchars($score3);?>},
                                      {key: "Physics", y: <?php echo htmlspecialchars($score4);?>},

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
                              </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <section class="panel">

                            <div class="slick-carousal">
                                <div class="overlay-c-bg"></div>
                                <div id="news-feed" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <h3 class="text-success">News</h3>
                                        <span class="date">14 November 2016</span>
                                        <h1>If today were the last day of your life, would you want to do what your are about to do today</h1>
                                        <div class="text-center">
                                            <a href="javascript:;" class="view-all">View All</a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <h3 class="text-success">News</h3>
                                        <span class="date">18 November 2016</span>
                                        <h1>Monte Carlo built by Raj Mehta and Nishant Bhatia</h1>
                                        <div class="text-center">
                                            <a href="javascript:;" class="view-all">View All</a>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <h3 class="text-success">News</h3>
                                        <span class="date">10 January 2017</span>
                                        <h1>It has huge usable widgets, amazing design, clean code quality, super responsive and quick customar support.</h1>
                                        <div class="text-center">
                                            <a href="javascript:;" class="view-all">View All</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </section>


                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">

                    </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            STUDENT NOTIFICATIONS
                            <span class="tools pull-right">
                                <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="noti-information notification-menu">
                            <!--notification info start-->
                            <div class="notification-list mail-list not-list">
								<?php
										$query="SELECT username , AVG(score) as avg , COUNT(username) as count from results GROUP BY username ORDER BY AVG(score) DESC LIMIT 5";
										$res=mysqli_query($conn,$query);
										while($row=mysqli_fetch_array($res)){
										echo'<a href="javascript:;" class="single-mail">';
                                        echo'<span class="icon bg-primary">';
                                        echo'<i class="fa fa-envelope-o"></i>';
                                        echo'</span>';
										echo'<span class="purple-color"> Username : '.$row["username"].'</span>'.'has a Score '.$row["avg"].' in '.$row["count"].' tests';

										echo'<span class="read tooltips" data-original-title="Mark as Unread" data-toggle="tooltip" data-placement="left">';
										echo'<i class="fa fa-circle-o"></i>';
										echo'</span>';
										echo'</a>';
										}
							?>
                            </div>
                            <!--notification info end-->
                        </div>
                    </section>
                </div>
                <section id="codes">
              <div  class="col-md-6">
                    <section  class="panel post-wrap pro-box team-member">
                        <aside>
                            <header class="panel-heading head-border">
                                SUBJECTS AND CODES
                                <span class="action-tools pull-right">
                                    <a class="fa fa-reorder" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="post-info">
                                <ol type="1" class="team-list cycle-pager external" id='no-template-pager'>
                                    <li> 1 - MATHS </li>
                                    <li> 2 - COMPUTER SCIENCE </li>
                                    <li> 3 - CHEMISTRY </li>
                                    <li> 4 - PHYSICS </li>
                                </ol>

                        </aside>
                    </section>
                </div>
              </section>
              </div>


            </div>
            <!--body wrapper end-->


            <!--footer section start-->
            <footer>
                2015 &copy; SlickLab by VectorLab.
            </footer>
            <!--footer section end-->


            <!-- Right Slidebar start -->
            <div class="sb-slidebar sb-right sb-style-overlay">
            <div class="right-bar">

            <span class="r-close-btn sb-close"><i class="fa fa-times"></i></span>

            <ul class="nav nav-tabs nav-justified-">
                <li class="active">
                    <a href="#chat" data-toggle="tab">Chat</a>
                </li>
                <li class="">
                    <a href="#info" data-toggle="tab">Info</a>
                </li>
                <li class="">
                    <a href="#settings" data-toggle="tab">Settings</a>
                </li>
            </ul>
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active " id="chat">
                <div class="online-chat">
                    <div class="online-chat-container">
                        <div class="chat-list">
                            <h3>Chat list</h3>
                            <h5>34 Friends Online, 80 Offline</h5>
                            <a href="#" class="add-people tooltips" data-original-title="Add People" data-toggle="tooltip" data-placement="left">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="side-title">
                            <h2>online</h2>
                            <div class="title-border-row">
                                <div class="title-border"></div>
                            </div>
                        </div>

                        <ul class="team-list chat-list-side">
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img2.jpg" alt="">
                                <i class="online dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Alison Jones
                                </span>
                                        <small class="text-muted">Start exploring</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img3.jpg" alt="">
                                <i class="online dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Jonathan Smith
                                </span>
                                        <small class="text-muted">Alien Inside</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img1.jpg" alt="">
                                <i class="away dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Anjelina Doe
                                </span>
                                        <small class="text-muted">Screaming...</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img3.jpg" alt="">
                                <i class="busy dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Franklin Adam
                                </span>
                                        <small class="text-muted">Don't lose the hope</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img2.jpg" alt="">
                                <i class="online dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Jeff Crowford
                                </span>
                                        <small class="text-muted">Just flying</small>
                                    </div>
                                </a>
                            </li>

                        </ul>

                        <div class="side-title">
                            <h2>Offline</h2>
                            <div class="title-border-row">
                                <div class="title-border"></div>
                            </div>
                        </div>
                        <ul class="team-list chat-list-side">
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img2.jpg" alt="">
                                <i class="offline dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Alison Jones
                                </span>
                                        <small class="text-muted">Start exploring</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img3.jpg" alt="">
                                <i class="offline dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Jonathan Smith
                                </span>
                                        <small class="text-muted">Alien Inside</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img1.jpg" alt="">
                                <i class="offline dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Anjelina Doe
                                </span>
                                        <small class="text-muted">Screaming...</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img3.jpg" alt="">
                                <i class="offline dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Franklin Adam
                                </span>
                                        <small class="text-muted">Don't lose the hope</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                        <span class="thumb-small">
                                <img class="circle" src="img/img2.jpg" alt="">
                                <i class="offline dot"></i>
                            </span>
                                    <div class="inline">
                                            <span class="name">
                                    Jeff Crowford
                                </span>
                                        <small class="text-muted">Just flying</small>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>


                </div>


            </div>

            <div role="tabpanel" class="tab-pane " id="info">
            <div class="chat-list info">
                <h3>Latest Information</h3>
                <a  href="javascript:;" class="add-people tooltips" data-original-title="Refresh" data-toggle="tooltip" data-placement="left">
                    <i class="fa fa-repeat"></i>
                </a>
            </div>

            <div class="aside-widget">
                <div class="side-title-alt">
                    <h2>Revenue</h2>
                    <a href="#" class="close side-w-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <ul class="team-list chat-list-side info">
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-circle green-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                Received Money from John Doe
                            </span>
                            <span class="value green-color">$12300</span>
                        </div>
                    </li>
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-circle purple-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                Total Admin Template Sales
                            </span>
                            <span class="value purple-color">$40100</span>
                        </div>
                    </li>
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-circle red-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                Monty Revenue
                            </span>
                            <span class="value red-color">$322300</span>
                        </div>
                    </li>
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-circle blue-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                Received Money from John Doe
                            </span>
                            <span class="value blue-color">$1520</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="aside-widget">

                <div class="side-title-alt">
                    <h2>Statistics</h2>
                    <a href="#" class="close side-w-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <ul class="team-list chat-list-side info statistics border-less-list">
                    <li>
                        <div class="inline">
                                    <span class="name">
                                         Foreign Visit
                                    </span>
                            <small class="text-muted">25% Increase</small>
                        </div>
                                <span class="thumb-small">
                                    <span id="foreign-visit" class="chart"></span>
                                </span>
                    </li>
                    <li>
                        <div class="inline">
                                    <span class="name">
                                Montly Visit
                            </span>
                            <small class="text-muted">Average visit 12% Increase</small>
                        </div>
                                <span class="thumb-small">
                                    <span id="monthly-visit" class="chart"></span>
                                </span>
                    </li>
                    <li>
                        <div class="inline">
                                    <span class="name">
                                Unique Visit
                            </span>
                            <small class="text-muted">35% unique visitor </small>
                        </div>
                                <span class="thumb-small">
                                    <span id="unique-visit" class="chart"></span>
                                </span>
                    </li>
                </ul>
            </div>

            <div class="aside-widget">
                <div class="side-title-alt">
                    <h2>Notification</h2>
                    <a href="#" class="close side-w-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <ul class="team-list chat-list-side info border-less-list">
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-bell green-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                Meeting with John Doe at
                            </span>
                            <span class="value text-muted">11.30 am</span>
                        </div>
                    </li>
                    <li>
                                <span class="thumb-small">
                            <i class="fa fa-users green-color"></i>
                        </span>
                        <div class="inline">
                                    <span class="name">
                                3 membership request pending
                            </span>
                            <span class="value text-muted">John, Smith, Lira</span>
                        </div>
                    </li>
                </ul>

            </div>

            <div class="aside-widget">


            <div class="side-title-alt">
                    <h2>System</h2>
                    <a href="#" class="close side-w-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            <ul class="team-list chat-list-side info border-less-list">
                    <li>
                        <div class="inline">
                                    <span class="name">
                                Received database error report from hosting provider
                            </span>
                            <span class="value text-muted">11.30 am</span>
                        </div>
                    </li>
                    <li>
                        <div class="inline">
                                    <span class="name">
                                Hosting Renew notification
                            </span>
                            <span class="value text-muted">12.00 pm</span>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="aside-widget">
                <div class="side-title-alt">
                    <h2>Work Progress</h2>
                    <a href="#" class="close side-w-close">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <ul class="team-list chat-list-side info border-less-list sale-monitor">
                    <li>
                        <div class="states">
                            <div class="info">
                                <div class="desc pull-left">Server Setup and Configuration</div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                            </div>
                            <div class="info">
                                <small class="percent pull-left text-muted">50% completed</small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="states">
                            <div class="info">
                                <div class="desc pull-left">Website Design & Development</div>
                            </div>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                            </div>
                            <div class="info">
                                <small class="percent pull-left text-muted">85% completed</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            </div>

            <div role="tabpanel" class="tab-pane " id="settings">
                <div class="chat-list bottom-border settings-head">
                    <h3>Account Setting</h3>
                    <h5>Configure your account as per your need.</h5>
                </div>
                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                    <li>
                        <div class="inline">
                                <span class="name">
                                Make my feature post public?
                            </span>
                            <small class="text-muted">Everyone will be able to see, like, comment
                                and share your feature post.</small>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small" checked/>
                        </span>
                    </li>
                    <li>
                        <div class="inline">
                                <span class="name">
                                Show offline Contacts
                            </span>
                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit.</small>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small2" checked/>
                        </span>
                    </li>

                    <li>
                        <div class="inline">
                                <span class="name">
                                Everyone will see my stuff
                            </span>
                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer
                                adipiscing elit.</small>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small3"/>
                        </span>
                    </li>

                </ul>

                <div class="chat-list bottom-border settings-head">
                    <h3>General Setting</h3>
                    <h5>Configure your account as per your need.</h5>
                </div>
                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                    <li>
                        <div class="inline">
                                <span class="name">
                                Show me Online
                            </span>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small4" checked/>
                        </span>
                    </li>
                    <li>
                        <div class="inline">
                                <span class="name">
                                Status visible to all
                            </span>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small5" />
                        </span>
                    </li>

                    <li>
                        <div class="inline">
                                <span class="name">
                                Show my work progess to all
                            </span>
                        </div>
                            <span class="thumb-small">
                            <input type="checkbox" class="js-switch-small6" checked/>
                        </span>
                    </li>

                </ul>

            </div>

            </div>
            </div>
            </div>
            <!-- Right Slidebar end -->

        </div>
        <!-- body content end-->
    </section>



<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>

<!--jquery-ui-->
<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="js/jquery-migrate.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>

<!--Nice Scroll-->
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--switchery-->
<script src="js/switchery/switchery.min.js"></script>
<script src="js/switchery/switchery-init.js"></script>

<!--flot chart -->
<script src="js/flot-chart/jquery.flot.js"></script>
<script src="js/flot-chart/flot-spline.js"></script>
<script src="js/flot-chart/jquery.flot.resize.js"></script>
<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="js/flot-chart/jquery.flot.pie.js"></script>
<script src="js/flot-chart/jquery.flot.selection.js"></script>
<script src="js/flot-chart/jquery.flot.stack.js"></script>
<script src="js/flot-chart/jquery.flot.crosshair.js"></script>


<!--earning chart init-->
<script src="js/earning-chart-init.js"></script>


<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>

<!--easy pie chart-->
<script src="js/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>


<!--vectormap-->
<script src="js/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/vector-map/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard-vmap-init.js"></script>

<!--Icheck-->
<script src="js/icheck/skins/icheck.min.js"></script>
<script src="js/todo-init.js"></script>

<!--jquery countTo-->
<script src="js/jquery-countTo/jquery.countTo.js"  type="text/javascript"></script>

<!--owl carousel-->
<script src="js/owl.carousel.js"></script>


<!--common scripts for all pages-->

<script src="js/scripts.js"></script>


<script type="text/javascript">

    $(document).ready(function() {

        //countTo

        $('.timer').countTo();

        //owl carousel

        $("#news-feed").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true
        });
    });

    $(window).on("resize",function(){
        var owl = $("#news-feed").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>
<?php
    /*} else {
        echo 'You are not authorized to access this page, please login.';
        echo "<a href='login.php'>Login</a>";
    }*/
?>
