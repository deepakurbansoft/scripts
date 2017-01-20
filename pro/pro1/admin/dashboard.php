<?php
include("db.php");
session_start();

$loginuser = $_SESSION['login_user'];


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CBPC | Coupons</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

        <?php include("header.php");?>

        <?php include("sidebar.php");?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">

                                <h3><?php echo get_cellcount('list')?></h3>
                                <p>Coupons</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="http://cbpc.urbansoft.cc/admin/couponlist" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">

                                <h3><?php echo get_cellcount('company')?></h3>
                                <p>Company</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="http://cbpc.urbansoft.cc/admin/company" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->

<!--                    <div class="col-lg-3 col-xs-6">-->
<!--                       -->
<!--                        <div class="small-box bg-yellow">-->
<!--                            <div class="inner">-->
<!--                                <h3>44</h3>-->
<!--                                <p>User Registrations</p>-->
<!--                            </div>-->
<!--                            <div class="icon">-->
<!--                                <i class="ion ion-person-add"></i>-->
<!--                            </div>-->
<!--                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-lg-3 col-xs-6">-->
<!--                       -->
<!--                        <div class="small-box bg-red">-->
<!--                            <div class="inner">-->
<!--                                <h3>65</h3>-->
<!--                                <p>Unique Visitors</p>-->
<!--                            </div>-->
<!--                            <div class="icon">-->
<!--                                <i class="ion ion-pie-graph"></i>-->
<!--                            </div>-->
<!--                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                        </div>-->
<!--                    </div>-->

                </div><!-- /.row -->


            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php include("footer.php");?>


</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

</body>
</html>
