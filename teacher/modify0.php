<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina">
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Elearning Add Quiz </title>

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

    include 'connect.php';
    include 'quiz_class.php';
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
                    Add Topics
                </h3>
				<?php
        $uploader=$_COOKIE["user"];
        //echo $uploader."is user";
				if(@$_GET['modify']==1){
          $entry= new quiz;
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {

          // Check if file already exists
          echo "Submitted";
          $entry->setName($_POST['name']);
          $entry->setSubject($_POST['subject']);
          $entry->setQuestions($_POST['q1'],$_POST['q2'],$_POST['q3'],$_POST['q4'],$_POST['q5']);
          $entry->setAnswers($_POST['a1'],$_POST['a2'],$_POST['a3'],$_POST['a4'],$_POST['a5']);

          $entry->setUploader($_COOKIE["user"]);
              //  echo $uploader."is user";
                                      $sql="INSERT INTO quiz(topic,subject,validity,q1,q2,q3,q4,q5,a1,a2,a3,a4,a5,username) VALUES('$entry->topic','$entry->subject','0','$entry->q1','$entry->q2','$entry->q3','$entry->q4','$entry->q5','$entry->a1','$entry->a2','$entry->a3','$entry->a4','$entry->a5','$entry->uploader');";
                      $result = $conn->query($sql);
                      if($result){

                        echo "Done";
                          $success="Quiz Sucessfully uploaded";

                      } else{ $success ='could not insert Quiz';
                              echo "undone";
                            }


              } else {
                  echo "Sorry, there was an error uploading your file.";
              }
          }



?>
              <!--  <span class="sub-title"><?php// if(@$_GET['modify']==1 ) echo $success;?></span> -->

            </div>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

                <div class="row">
					<div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Topic
                        </header>
                        <div class="panel-body">
                            <form role="form" method="POST" action="modify0.php?modify=1" ENCTYPE='multipart/form-data'>

                                                          <div class="form-group">
                                                              <label for="Subject">Subject code</label><br>
                                                              <input type="radio" name="subject"  value="1" checked> Maths<br>
                                                              <input type="radio" name="subject"  value="2"> Computer Science<br>
                                                              <input type="radio" name="subject"  value="3"> Chemistry<br>
                                                              <input type="radio" name="subject"  value="4"> Physics
                                                              </div>
                                                            <div class="form-group">
                                                                <label for="NAME">Name</label>
                                                                <input type="text"  name="name" class="form-control" placeholder=" Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="q1">Question 1</label>
                                                              <textarea type="text" name="q1" rows="10" class="form-control" id="q1" ></textarea>
                                                            </div>
                                                            <div class="form-group" >
                                                                <label for="a1">Answer 1</label>
                                                                <input type="radio" name="a1"  value="a" checked>A<br>
                                                                <input type="radio" name="a1"  value="b"> B<br>
                                                                <input type="radio" name="a1"  value="c"> C<br>
                                                                <input type="radio" name="a1"  value="d"> D
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="q2">Question 2</label>
                                                              <textarea type="text" name="q2" rows="10" class="form-control" id="q1" ></textarea></div>
                                                            <div class="form-group">
                                                                <label for="a2">Answer 2</label>
                                                                <input type="radio" name="a2"  value="a" checked>A<br>
                                                                <input type="radio" name="a2"  value="b"> B<br>
                                                                <input type="radio" name="a2"  value="c"> C<br>
                                                                <input type="radio" name="a2"  value="d"> D
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="q3">Question 3</label>
                                                              <textarea type="text" name="q3" rows="10" class="form-control" id="q1" ></textarea></div>
                                                            <div class="form-group">
                                                                <label for="a3" >Answer 3</label>
                                                                <input type="radio" name="a3"  value="a" checked>A<br>
                                                                <input type="radio" name="a3"  value="b"> B<br>
                                                                <input type="radio" name="a3"  value="c"> C<br>
                                                                <input type="radio" name="a3"  value="d"> D</div>

                                                            <div class="form-group">
                                                                <label for="q4">Question 4</label>
                                                              <textarea type="text" name="q4" rows="10" class="form-control" id="q1" ></textarea></div>
                                                            <div class="form-group">
                                                                <label for="a4">Answer 4</label>
                                                                <input type="radio" name="a4"  value="a" checked>A<br>
                                                                <input type="radio" name="a4"  value="b"> B<br>
                                                                <input type="radio" name="a4"  value="c"> C<br>
                                                                <input type="radio" name="a4"  value="d"> D</div>

                                                            <div class="form-group">
                                                                <label for="q5">Question 5</label>
                                                            <textarea type="text" name="q5" rows="10" class="form-control" id="q1" ></textarea>  </div>
                                                            <div class="form-group">
                                                                <label for="a5">Answer 5</label>
                                                                <input type="radio" name="a5"  value="a" checked>A<br>
                                                                <input type="radio" name="a5"  value="b"> B<br>
                                                                <input type="radio" name="a5"  value="c"> C<br>
                                                                <input type="radio" name="a5"  value="d"> D</div>
                                                           <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                                            </form>
                        </div>
                    </section>
                </div>

				<div class="col-lg-6">
					<section class="panel">
                        <header class="panel-heading">
                            All Quizez
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
								<thead>
								<tr>
									<th>Quiz ID</th>
                  <th>Name</th>
									<th>Subject</th>
									<th>valid</th>
                  <th>user</th>

								</tr>
								</thead>
								<tbody>
								<?php

									$query="Select * FROM `quiz`;";
									$query_res= $conn->query($query);
									while($row = $query_res->fetch_assoc()){
									echo "<tr>";
                  echo "<td>".$row['quizid']."</td>";
									echo "<td>".$row['topic']."</td>";
									echo "<td>".$row['subject']."</td>";
									echo "<td>".$row['validity']."</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "</tr>";
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
