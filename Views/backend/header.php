<?php
    // session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link type="text/css" href="admins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="admins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="admins/css/theme.css" rel="stylesheet">
        <link type="text/css" href="admins/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Trang quản trị</a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav pull-right">
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="admins/images/user.png" class="nav-avatar" /> -->
                                <!-- <b class="caret"></b> -->
                                <?php
                                    echo $_SESSION['username_S'];
                                ?>
                            </a>
                            <!-- <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="index.php?controller=register&action=logout">Logout</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="index.php?controller=admin"><i
                                        class="menu-icon icon-dashboard"></i>Trang quản trị
                                </a></li>
                            <li><a href="index.php?controller=admin&action=khachHangIndex"><i
                                        class="menu-icon icon-bullhorn"></i>Danh sách khách hàng </a>
                            </li>
                            <li><a href="index.php?controller=admin&action=categoryIndex"><i
                                        class="menu-icon icon-bullhorn"></i>Danh mục sản phẩm chính </a>
                            </li>
                            <li><a href="index.php?controller=admin&action=sliderIndex"><i
                                        class="menu-icon icon-inbox"></i>Quản lí Sliders <b
                                        class="label green pull-right">
                                        11</b> </a></li>
                            <li><a href="index.php?controller=admin&action=colorIndex"><i
                                        class="menu-icon icon-tasks"></i>Màu sắc <b class="label orange pull-right">
                                        19</b> </a></li>
                            <li><a href="index.php?controller=admin&action=sizeIndex"><i
                                        class="menu-icon icon-tasks"></i>Kích cở <b class="label orange pull-right">
                                        19</b> </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a href="index.php?controller=admin&action=productIndex"><i
                                        class="menu-icon icon-bold"></i> Quản lí sản phẩm </a>
                            </li>
                            <!-- <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Quản lí chi tiết sản
                                    phẩm </a></li> -->
                            <li><a href="index.php?controller=admin&action=binhLuanIndex"><i class="menu-icon icon-paste"></i>Quản lí bình luận </a></li>
                            <li><a href="index.php?controller=admin&action=voucherIndex"><i class="menu-icon icon-table"></i>Quản lí khuyến mãi </a></li>
                            <li><a href="index.php?controller=admin&action=hoadonIndex"><i class="menu-icon icon-bar-chart"></i>Quản lí hóa đơn </a></li>
                            <!-- <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Quản lí chi tiết hóa đơn -->
                                </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i
                                        class="menu-icon icon-cog">
                                    </i><i class="icon-chevron-down pull-right"></i><i
                                        class="icon-chevron-up pull-right">
                                    </i>More Pages </a>
                                <ul id="togglePages" class="collapse unstyled">
                                    <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                    <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                    <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?controller=register&action=logout"><i
                                        class="menu-icon icon-signout"></i>Logout </a></li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>