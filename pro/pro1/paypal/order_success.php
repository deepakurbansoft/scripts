<?php
session_start();
extract($_POST);
include("db.php");
session_start();
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];
include('define_string.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CBPC | Coupons</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../css/style.css" rel="stylesheet">

    <link href="../bower_components/build.css" rel="stylesheet">

    <link href="../vendor/pagination/styles.css" rel="stylesheet">
    <link href="../vendor/checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>

    <script src="../js/custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }

    </style>
</head>

<body>

<!-- Wrap all page content here -->
<div id="wrap">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top cbpc_bg">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <img src="../img/cbpc_logo.jpg" width="300">

<!--                <a class="navbar-brand" href="#">cashbookpickandclick.com</a>-->
            </div>

            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">

                    <li><a href="<?php echo site_url ?>">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="active"><a href="#">Coupons</a></li>
                    <li><a href="#">Contact Us</a></li>


                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title" style="margin-top: 100px; text-align: center;">
                    Your Order has been successfully placed. <a href="<?php echo site_url ?>">Home</a>


<br><br>
                    <?php

                    $token = substr($_GET['token'],3);



                    $user_id =  $_SESSION['cbpc_user'];


                   $user_email = get_cell('users',$user_id,'email');


                    include 'sendmail_subscription.php'?>


                </div>


            </div>


        </div>


    </div>


</div>







</body>

</html>

