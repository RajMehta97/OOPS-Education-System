<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina">
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>MONTE CARLO Current Guests</title>

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

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
<?php
   

    // enable sessions
    session_start();
	
	 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="hrs";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	
	
	// select database
    if (mysqli_select_db( $conn, $db) === false)
        die("Could not select database");
  ?>
      <?php if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) { ?>

      <?php } ?>
    <section>
        <!--Side Navigation Bar Starts-->
        <?php include 'common/sideNav.php'; ?>
        <!--Side Navigation Bar Ends-->

        <!-- body content start-->
        <div class="body-content" style="min-height: 1200px;">
		
            <!-- header section start-->
            <?php include 'common/header.php'; ?>
            <!-- header section end-->

            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Current Guests at Monte Carlo
                </h3>
				<?php

				if(@$_GET['view']==1){
							$option=@$_POST["search_options"];
							if($option=="bookid"){
							 echo'<div class="form-group">';
							 echo'<form role="form" method="POST" action="currentGuest.php?bookidgiven=1">';
                             echo'<label for="BOOKING ID">Booking ID</label>';
                             echo'<input type="text"  name="bookID_booking" class="form-control" placeholder="Booking ID">';
							 echo'<button type="submit" class="btn btn-info">Submit</button>';
							 echo'</form>';
                             echo'</div>';
							}
							if($option=="dates"){
							 echo'<div class="form-group">';
							 echo'<form role="form" method="POST" action="currentGuest.php?datesgiven=1">';
                             echo'<label for="Dates">Dates</label>';
                             echo'<input type="text"  name="dates_check_in" class="form-control" placeholder="YYYY-MM-DD checkin Date">';
							 echo'<input type="text"  name="dates_check_out" class="form-control" placeholder="YYYY-MM-DD checkout Date">';
							 echo'<button type="submit" class="btn btn-info">Submit</button>';
							 echo'</form>';
                             echo'</div>';								
							}
							else if($option=="custname"){
							 echo'<div class="form-group">';
							 echo'<form role="form" method="POST" action="currentGuest.php?custnamegiven=1">';
                             echo'<label for="Customer Name">Last Name</label>';
                             echo'<input type="text"  name="custname_name" class="form-control" placeholder="Last Name">';
							 echo'<button type="submit" class="btn btn-info">Submit</button>';
							 echo'</form>';
                             echo'</div>';								
							}
				}
				?>
                <span class="sub-title"><?php echo 'Welcome to Monte Carlo';?></span>
                <div class="state-information">
                    <div class="state-graph">
                        <div id="balance" class="chart"></div>
                        <div class="info">Total Revenue $ 2,317</div>
                    </div>
                    <div class="state-graph">
                        <div id="item-sold" class="chart"></div>
                        <div class="info">Total Bookings 1230</div>
                    </div>
                </div>
            </div>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">
					<div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            View Booking
                        </header>
                        <div class="panel-body">
                            <form role="form" method="POST" action="currentGuest.php?view=1">
								<div class="col-0-lg-10">
								<strong>Search By:-</strong>
                                <select name="search_options" class="form-control m-b-10">
                                    <option value="bookid">Booking ID</option>
									<option value="dates">Dates</option>
                                    <option value="custname">Customer Name</option>
                                </select>							
                               <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>
                    </section>
                </div>
							
				<div class="col-lg-6">
					<section class="panel">
                        <header class="panel-heading">
                            Current Booking Data
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
								<thead>
								<tr>
									<th>BookingID</th>
									<th>Customer</th>
									<th>Guests</th>
									<th>Checkin</th>
									<th>Checkout</th>
									<th>Type</th>
									<th>Price</th>
								</tr>
								</thead>
								<tbody>
								<?php
								
								
								$curr_date=date("Y-m-d");
									if(isset($_GET['bookidgiven'])){
										$bookID_booking=$_POST['bookID_booking'];
										$query="Select * FROM `booking` WHERE booking_id='$bookID_booking' AND '$curr_date' BETWEEN checkin AND checkout;";
										$query_res=mysqli_query($conn,$query);
									while($row=mysqli_fetch_array($query_res)){
									echo "<tr>";
									echo "<td>".$row['booking_id']."</td>";
									echo "<td>".$row['last_name']."</td>";
									echo "<td>".$row['no_of_guest']."</td>";
									echo "<td>".$row['checkin']."</td>";
									echo "<td>".$row['checkout']."</td>";
									echo "<td>".$row['room_type']."</td>";
									echo "<td>".$row['price_paid']."</td>";
									echo "</tr>";
									}
									}
									else if(isset($_GET['datesgiven'])){
										$checkin=$_POST['dates_check_in'];
										$checkout=$_POST['dates_check_out'];
										$query="Select * FROM `booking` WHERE checkin='$checkin' AND checkout='$checkout' AND '$curr_date' BETWEEN checkin AND checkout;";
										$query_res=mysqli_query($conn,$query);
									while($row=mysqli_fetch_array($query_res)){
									echo "<tr>";
									echo "<td>".$row['booking_id']."</td>";
									echo "<td>".$row['last_name']."</td>";
									echo "<td>".$row['no_of_guest']."</td>";
									echo "<td>".$row['checkin']."</td>";
									echo "<td>".$row['checkout']."</td>";
									echo "<td>".$row['room_type']."</td>";
									echo "<td>".$row['price_paid']."</td>";
									echo "</tr>";
									}
									}	
									else if(isset($_GET['custnamegiven'])){
										$customer_name=$_POST['custname_name'];
										$query="Select * FROM `booking` WHERE last_name='$customer_name' AND '$curr_date' BETWEEN checkin AND checkout;";
										$query_res=mysqli_query($conn,$query);
									while($row=mysqli_fetch_array($query_res)){
									echo "<tr>";
									echo "<td>".$row['booking_id']."</td>";
									echo "<td>".$row['last_name']."</td>";
									echo "<td>".$row['no_of_guest']."</td>";
									echo "<td>".$row['checkin']."</td>";
									echo "<td>".$row['checkout']."</td>";
									echo "<td>".$row['room_type']."</td>";
									echo "<td>".$row['price_paid']."</td>";
									echo "</tr>";
									}
									}									
									else{
											
									$query="SELECT * from booking WHERE '$curr_date' BETWEEN checkin AND checkout";
									$query_res=mysqli_query($conn,$query);
									while($row=mysqli_fetch_array($query_res)){
									echo "<tr>";
									echo "<td>".$row['booking_id']."</td>";
									echo "<td>".$row['last_name']."</td>";
									echo "<td>".$row['no_of_guest']."</td>";
									echo "<td>".$row['checkin']."</td>";
									echo "<td>".$row['checkout']."</td>";
									echo "<td>".$row['room_type']."</td>";
									echo "<td>".$row['price_paid']."</td>";
									echo "</tr>";	
									}
									}
								?>
								</tbody>
							</table>
                        </div>
                    </section>
				</div>
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
                <a href="#" class="add-people tooltips" data-original-title="Refresh" data-toggle="tooltip" data-placement="left">
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

<!--Sparkline Chart-->
<script src="js/sparkline/jquery.sparkline.js"></script>
<script src="js/sparkline/sparkline-init.js"></script>


<!--common scripts for all pages-->
<script src="js/scripts.js"></script>


</body>
</html>
