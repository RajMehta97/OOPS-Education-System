<!-- sidebar left start-->
<div class="sidebar-left">
    <!--responsive view logo start-->
    <div class="logo white-logo-bg visible-xs-* visible-sm-*">
        <a href="index.php">
            <img src="img/logo-icon.png" alt="">
            <!--<i class="fa fa-maxcdn"></i>-->
            <!--                    <span class="brand-name">Greesy Hands</span>-->
        </a>
    </div>
    <!--responsive view logo end-->

    <div class="sidebar-left-info">
        <!-- visible small devices start-->
        <div class=" search-field">  </div>
        <!-- visible small devices end-->

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked side-navigation">
            <li>
                <h3 class="navigation-title">Navigation</h3>
            </li>
            <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Summary</span></a></li>
            <li class="menu-list">
                <a href=""><i class=""></i>  <span>Theory</span></a>
                <ul class="child-list">
                    <li><a href="modify.php"> Add Topic</a></li>
                    <li><a href="cancel.php"> Remove Topic</a></li>
                    <li><a href="view.php"> View All Topics</a></li>
					<!---<li><a href="currentGuest.php">  </a></li>--->
                </ul>
            </li>
			 <li class="menu-list">
                <a href=""><i class=""></i>  <span>Quiz</span></a>
                <ul class="child-list">
                    <li><a href="modify0.php"> Add Quiz</a></li>
                    <li><a href="cancel0.php"> Remove Quiz</a></li>
                    
					<!---<li><a href="currentGuest.php">  </a></li>--->
                </ul>
            </li>

        </ul>
        <!--sidebar nav end-->

        <!--sidebar widget start-->
        <div class="sidebar-widget">
            <h4>Server Status</h4>
            <ul class="list-group">
                <li>
                    <span class="label label-danger pull-right">33%</span>
                    <p>CPU Used</p>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 33%;">
                            <span class="sr-only">33%</span>
                        </div>
                    </div>
                </li>
                <li>
                    <span class="label label-warning pull-right">65%</span>
                    <p>Bandwidth</p>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 65%;">
                            <span class="sr-only">65%</span>
                        </div>
                    </div>
                </li>
                <li><a href="javascript:;" class="btn btn-success btn-sm ">View Details</a></li>
            </ul>
        </div>
        <!--sidebar widget end-->

    </div>
</div>
<!-- sidebar left end-->
