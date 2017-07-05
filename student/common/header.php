<!-- header section start-->
<div class="header-section">

    <!--logo and logo icon start-->
    <div class="logo dark-logo-bg hidden-xs hidden-sm">
        <a href="index.php">
            <img src="img/logo-icon.png" alt="">
            <!--<i class="fa fa-maxcdn"></i>-->
            <span class="brand-name">Elearning Portal</span>
        </a>
    </div>

    <div class="icon-logo dark-logo-bg hidden-xs hidden-sm">
        <a href="index.php">
            <img src="img/logo-icon.png" alt="">
            <!--<i class="fa fa-maxcdn"></i>-->
        </a>
    </div>
    <!--logo and logo icon end-->

    <!--toggle button start-->
    <a class=""><i class=""></i></a>
    <!--toggle button end-->

    <!--mega menu start-->
    <div id="navbar-collapse-1" class="navbar-collapse collapse yamm mega-menu">
        <ul class="nav navbar-nav">
            <!-- Classic list -->
            <li class=""><a href="" data-toggle="" class=""><b
                        class=""></b></a>
                <ul class="dropdown-menu wide-full">
                    <li>
                        <!-- Content container to add padding -->
                        <div class="">
                            <div class="row">


                            </div>
                        </div>
                    </li>
                </ul>
            </li>

            <!-- Classic dropdown -->
<!--            <li class="dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"> English  <b-->
<!--                        class=" fa fa-angle-down"></b></a>-->
<!--                <ul role="menu" class="dropdown-menu language-switch">-->
<!--                    <li>-->
<!--                        <a tabindex="-1" href="javascript:;"><span> German </span><img src="img/flags/germany_flag.jpg" alt=""/></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a tabindex="-1" href="javascript:;"><span> Italian </span> <img src="img/flags/italy_flag.jpg" alt=""/></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a tabindex="-1" href="javascript:;"><span> French </span> <img src="img/flags/french_flag.jpg" alt=""/></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a tabindex="-1" href="javascript:;"><span> Spanish </span> <img src="img/flags/spain_flag.jpg" alt=""/></a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a tabindex="-1" href="javascript:;"><span> Russian </span> <img src="img/flags/russia_flag.jpg" alt=""/></a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

        </ul>
    </div>
    <!--mega menu end-->
    <div class="notification-wrap">
        <!--left notification start-->
        <div class="left-notification">
            <ul class="notification-menu">
                <!--mail info start-->
                <li class="d-none">
                    <a href="" class="" data-toggle="dropdown">
                        <i class=""></i>
                        <span class="badge bg-primary"></span>
                    </a>

                    <div class="">
                        <div class="title-row">
                            <h5 class="title purple">

                            </h5>
                            <a href=";" class=""></a>
                        </div>
                        <div class="">

                        </div>
                    </div>
                </li>
                <!--mail info end-->

                <!--task info start-->
                <li class="d-none">
                    <a href="" class="" data-toggle="dropdown">

                    </a>

                    <div class="">

                        <div class="">

                        </div>
                    </div>
                </li>
                <!--task info end-->

                <!--notification info start-->
                <li>

                        <i class=""></i>
                        <span class="badge bg-warning"></span>
                    </a>

                    <div class="">


                        <div class="">
                            <div class="">
                                <a href="javascript:;" class="">



                            </div>
                        </div>
                    </div>
                </li>
                <!--notification info end-->
            </ul>
        </div>
        <!--left notification end-->


        <!--right notification start-->
        <div class="right-notification">
            <ul class="notification-menu">
<!--                <li>-->
<!--                    <form class="search-content" action="index.html" method="post">-->
<!--                        <input type="text" class="form-control" name="keyword" placeholder="Search...">-->
<!--                    </form>-->
<!--                </li>-->

                <li>
                    <a href="javascript:;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						Hi <?php echo htmlentities($_COOKIE['user']);?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu purple pull-right">

                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
<!--                Chat Box Button-->
<!--                <li>-->
<!--                    <div class="sb-toggle-right">-->
<!--                        <i class="fa fa-indent"></i>-->
<!--                    </div>-->
<!--                </li>-->

            </ul>
        </div>
        <!--right notification end-->
    </div>

</div>
<!-- header section end-->
