<?php
    session_start();
    if ($_SESSION['authenticated']==false) {
      $host = $_SERVER["HTTP_HOST"];
      $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
      //$_SESSION['username'];
      header("Location: http://$host$path/index.php");
      exit;
   }

   include 'admin_class.php';
   include 'summary_class.php';
//    include_once 'includes/db_connect.php';
//    include_once 'includes/functions.php';
//
//    sec_session_start();
//    if(login_check($conn) == true) {
//        // Add your protected page content here!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">
    <link href="build/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
    <script src="build/nv.d3.js"></script>
    <script src="lib/stream_layers.js"></script>
    <title>Elearning - Dashboard</title>
    <style>
        text {
            font: 12px sans-serif;
        }
        svg {
            display: block;
        }
        html, body, #chart1, svg {
            margin: 0px;
            padding: 0px;
            height: 100%;
            width: 100%;
        }
    </style>
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
                    ELEARNING SUMMARY
                </h3>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$db="elearning";

					// Create connection
					$conn = mysqli_connect($servername, $username, $password);

					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}


	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
	// Some Report Generation Queries
    $sumclass= new summary_class;


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


  					$sql="SELECT count(*) as profs from members where type='professor';";
  					$result=mysqli_query($conn,$sql);
  					$row=mysqli_fetch_array($result);
  					$sumclass->setno_of_profs($row['profs']);
  					//$ratio=intval(($bookings/$enquiry)*100);
            $sql="SELECT count(*) as studs from members where type ='student';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $sumclass->setno_of_studs($row['studs']);
					$sql="SELECT count(*) as quizes from quiz WHERE validity='1';";
  			  $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          $sumclass->setquiz($row['quizes']);
          $sql="SELECT count(*) as topics from topics WHERE validity='1';";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          $sumclass->settopic($row['topics']);


          					$sql="SELECT sum(score) as score from results ;";
          					$result=mysqli_query($conn,$sql);
          					$row=mysqli_fetch_array($result);
          					$score=$row['score'];

                    $sql="SELECT count(*) as result from results WHERE 1;";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result);
                    $no_of_results=$row['result'];

                    $sumclass->setavg_score($score/$no_of_results);

					if(@$_POST['action']=="ADD"){
            $admin = new admin_class;
            $admin->setname(@$_POST['name']);
            $admin->setusername(@$_POST['uname']);
            $admin->setpassword(@$_POST['password']);
            if(!empty($admin->username) &&!empty($admin->password) && !empty($admin->name)){
						$query="INSERT INTO `members`(`username`, `password`,`name`,`type`) VALUES ('$admin->username','$admin->password','$admin->name','administrator');";
						$res=mysqli_query($conn,$query);
						}
					}
					if(@$_POST['action']=="REMOVE"){
            $admin = new admin_class;
            $admin->setname(@$_POST['name']);
            $admin->setusername(@$_POST['uname']);
            $admin->setpassword(@$_POST['password']);
            //$uname=@$_POST['uname'];
						//$password=@$_POST['password'];
            //$name=@$_POST['name'];
						if(!empty($admin->username) &&!empty($admin->password) && !empty($admin->name)){
						$query="DELETE from `members` WHERE username='$admin->username' AND password='$admin->password';";
						$res=mysqli_query($conn,$query);
						}
					}
				?>
                <span class="sub-title">Welcome to Elearning Summary</span>
                <div class="state-information">
                    <div class="state-graph">
                        <div id="balance" class="chart"></div>
                        <div class="info">Total Professors <?php echo htmlspecialchars($sumclass->no_of_profs)?></div>
                    </div>
                    <div class="state-graph">
                        <div id="item-sold" class="chart"></div>
                        <div class="info">Total Students <?php echo htmlspecialchars($sumclass->no_of_studs)?></div>
                    </div>
                </div>
            </div>
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
                                <h1 class="timer" data-from="0" data-to="<?php echo htmlspecialchars($sumclass->no_of_topics);?>"
                                    data-speed="1100">
                                </h1>
                                <p>Total Topics</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel ">
                            <div class="symbol purple-color">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="value gray">
                                <h1 class="purple-color timer" data-from="0" data-to="<?php echo htmlspecialchars($sumclass->no_of_quizes);?>"
                                    data-speed="1100">
                                </h1>
                                <p>Total Quizes</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel green">
                            <div class="symbol ">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div class="value white">
                                <h1 class="timer" data-from="0" data-to="<?php echo htmlspecialchars($sumclass->avg_score);?>"
                                    data-speed="1100">
                                    <!--432-->
                                </h1>
                                <p>Average Score</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol green-color">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="value gray">
                                <h1 class="green-color timer" data-from="0" data-to="<?php echo htmlspecialchars($total_rooms);?>"
                                    data-speed="2500">
                                </h1>
                                <p>Total</p>
                            </div>
                        </section>
                    </div>
                </div>
                <!--state overview end-->

                <div class="row">
                    <div class="col-md-8">
                        <section class="panel">
                            <header class="panel-heading">
                                Student Report Graph
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body col-md-4">
                              <div id="chart1">
                                  <svg>
                                    <div class='with-3d-shadow with-transitions'>

                                    <script>

                                        historicalBarChart = [
                                            {
                                                key: "Cumulative Return",
                                                values: [
                                                    {
                                                        "label" : "Maths" ,
                                                        "value" : <?php echo htmlspecialchars($score1);?>
                                                    } ,
                                                    {
                                                        "label" : "CSE" ,
                                                        "value" : <?php echo htmlspecialchars($score2);?>
                                                    } ,
                                                    {
                                                        "label" : "Chem" ,
                                                        "value" : <?php echo htmlspecialchars($score3);?>
                                                    } ,
                                                    {
                                                        "label" : "Phy" ,
                                                        "value" : <?php echo htmlspecialchars($score4);?>
                                                    }

                                                ]
                                            }
                                        ];

                                        nv.addGraph(function() {
                                            var chart = nv.models.discreteBarChart()
                                                .x(function(d) { return d.label })
                                                .y(function(d) { return d.value })
                                                .staggerLabels(true)
                                                //.staggerLabels(historicalBarChart[0].values.length > 8)
                                                .showValues(true)
                                                .duration(250)
                                                ;

                                            d3.select('#chart1 svg')
                                                .datum(historicalBarChart)
                                                .call(chart);

                                            nv.utils.windowResize(chart.update);
                                            return chart;
                                        });

                                    </script>
                                    </div>


                                  </svg>
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
                                        <h1>OOPS project Built by Nishant Raj Sanchi</h1>
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


                          <!--  <div class="panel-body- weather-widget">
                                <div class="weather-state">
                                    <span class="weather-icon">
                                        <i class="slicon-weather_downpour_fullmoon"></i>
                                    </span>

                                    <span class="weather-type">Storm</span>
                                </div>
                                <div class="weather-info">
                                    <span class="degree">13</span>
                                    <span class="weather-city">New York</span>
                                    <div class="switch-btn">
                                        <input type="checkbox" class="js-switch-small-green " checked>
                                    </div>
                                    <div class="weather-chart m-t-40" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="1.5" data-line-color="#0bc2af" data-spot-color="#0bc2af" data-fill-color=""  data-highlight-line-color="#0bc2af" data-spot-radius="0" data-data="[1,5,3,6,4,7,9]"></div>
                                </div>

                            </div>
                        </section>-->
                    </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            notification
                            <span class="tools pull-right">
                                <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="noti-information notification-menu">
                            <!--notification info start-->
                            <div class="notification-list mail-list not-list">
								<?php
										$query="SELECT * from topics WHERE validity='0' ORDER BY topicid ASC LIMIT 5;";
										$res=mysqli_query($conn,$query);
										while($row=mysqli_fetch_array($res)){
										echo'<a href="javascript:;" class="single-mail">';
                                        echo'<span class="icon bg-primary">';
                                        echo'<i class="fa fa-envelope-o"></i>';
                                        echo'</span>';
										echo'<span class="purple-color">'.$row["name"].'</span>'.' LINK '.$row["link"].' Subject '.$row["subject"];
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
                <div class="col-md-6">
                    <section class="panel post-wrap pro-box team-member">

                        <aside>
                            <header class="panel-heading head-border">
                                team member
                                <span class="action-tools pull-right">
                                    <a class="fa fa-reorder" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="post-info">
                                <ul class="team-list cycle-pager external" id='no-template-pager'>
                                    <li>
                                        <?php
											$sql="SELECT name from members where type='administrator';";
											$result=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($result)){
											 echo'<a href="javascript:;">';
                                            echo'<span class="thumb-small">';
                                            echo'<img class="circle" src="img/img2.jpg" alt=""/>';
                                            echo'<i class="online dot"></i>';
                                            echo'</span>';
                                            echo'<span class="name">'.$row["name"].'</span>';
											echo'</a>';
											}
										?>
                                    </li>
                                </ul>
                                <div class="add-more-member">
                                    <a href="javascript:;" class=" ">Add new Admin Member</a>
									<div class="row">
									<div class="col-lg-10">
									<section class="panel">
									<div class="panel-body">
									<form role="form" method="POST" action="admin_loggedin.php?addnew=1">
									<div class="form-group">
									<label for="UserName">User Name</label>
                                    <input type="text"  name="uname" class="form-control" placeholder="UserName">
									</div>
									<div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password"  name="password" class="form-control" placeholder="Password">
									</div>
                  <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text"  name="name" class="form-control" placeholder="Name">
									</div>
									<button type="submit" class="btn btn-info" name="action" value="ADD">ADD ADMIN</button><br><br>
									<button type="submit" class="btn btn-info" name="action" value="REMOVE">REMOVE ADMIN</button>
                            </form>
                        </div>
                    </section>
                </div>
                                </div>
                            </div>
                        </aside>
                    </section>
                </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body cpu-graph">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="c-info">
                                            <h3>cpu usages</h3>
                                            <p>Once this tab is open click the CPU button above the list of programs twice</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="easy-pie-chart">
                                            <div class="percentage-light" data-percent="33"><span>33%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



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
