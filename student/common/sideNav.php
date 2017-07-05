<?php  $host = $_SERVER["HTTP_HOST"];
          $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");?><!-- sidebar left start-->
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

            </li>

            <li >
                <a href=""><i class=""></i> <a href="http://<?php echo $host.$path;?>/scoresheet.php" <span>SCORESHEET</span></a>

            </li>


        </ul>
        <!--sidebar nav end-->

        <!--sidebar widget start-->
        <div class="sidebar-widget">

            <ul class="list-group">
                <li>


                </li>
                <li>

                </li>

            </ul>
        </div>
        <!--sidebar widget end-->

    </div>
</div>
<!-- sidebar left end-->
