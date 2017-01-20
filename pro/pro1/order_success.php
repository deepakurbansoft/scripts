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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>

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
                <a href="index.php"><img src="img/cbpc_logo.jpg" width="300"></a>
<!--                <a class="navbar-brand" href="#">cashbookpickandclick.com</a>-->
            </div>

            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">

                    <li><a href="javascript:;" data-toggle="modal" data-target="#contact_modal">Contact Us</a></li>


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



<div id="contact_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal" style="text-align: left;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>

            <div class="modal-body" style="text-align: left; padding: 30px; min-width: 600px;">
                <style type="text/css">
                    .contact-form{ margin-top:15px;}
                    .contact-form .textarea{ min-height:220px; resize:none;}
                    .form-control{ box-shadow:none; border-color:#eee; height:49px;}
                    .form-control:focus{ box-shadow:none; border-color:#00b09c;}
                    .form-control-feedback{ line-height:50px;}
                    .main-btn{ background:#00b09c; border-color:#00b09c; color:#fff;}
                    .main-btn:hover{ background:#00a491;color:#fff;}
                    .form-control-feedback {
                        line-height: 50px;
                        top: 0px;
                    }
                </style>

                <div class="row">
                    <form role="form" id="contact-form" class="contact-form" method="POST">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" autocomplete="off" id="name" placeholder="Name">
                                    <small style="color: #B84242;" class="help-block" id="name_error" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="INVALID"></small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail">
                                    <small style="color: #B84242;" class="help-block" id="email_error" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="INVALID"></small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control textarea" rows="3" name="message" id="message" placeholder="Message"></textarea>
                                    <small style="color: #B84242;" class="help-block" id="message_error" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="INVALID"></small>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success fade in hide" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 25px !important;">&times;</a>
                            <strong>Success!</strong> Your Message has been sent.
                        </div>

                        <div class="alert alert-danger fade in hide">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Failed!</strong> Your Message can't be sent. Try Later.
                        </div>

                </div>


            </div>

            <div class="modal-footer" style="border-radius:">

                <!--                <button type="submit" class="btn main-btn pull-right cbpc_btn">Send a message</button>-->

                <!--                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" onclick="contactus()">Send a message</button>-->

                <div class="row">
                    <div class="col-md-12">
                        <button type="button" onclick="contactform_submit()" class="btn cbpc_btn pull-right">Send a message</button>
                    </div>
                </div>
                </form>

            </div>
        </div>

    </div>
</div>

<script type="application/javascript">

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    function contactform_submit() {

        $('#result_div').html('');
        var flag = 0;

        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();


        if (name == "") {
            $('#name').css('border-color', '#B84242');
            $('#name_error').html("The Name is required and cannot be empty");

            flag = 1;
        } else {
            $('#name').css('border-color', '#cccccc');
            $('#name_error').html("");

        }


        if (email == "") {
            $('#email').css('border-color', '#B84242');
            $('#email_error').html("The email address is required");

            flag = 1;
        } else {

            if (isValidEmailAddress(email)) {
                $('#email').css('border-color', '#cccccc');
                $('#email_error').html("");


            } else {
                $('#email').css('border-color', '#B84242');
                $('#email_error').html("Enter valid email");

                flag = 1;
            }


        }

        if (message == "") {
            $('#message').css('border-color', '#B84242');
            $('#message_error').html("The message is required");

            flag = 1;
        } else {
            $('#message').css('border-color', '#cccccc');
            $('#message_error').html("");

        }


        if (flag == 1) {
            //alert('Check Errors.');
        }
        else {

            $.ajax({
                type: 'POST',
                url: 'send_mail.php',
                data: $('#contact-form').serialize(),
                dataType  : 'json',
                success: function (data) {
                    if (data.success) {

                        $('#contact-form').each(function () {
                            this.reset();
                        });

                        $('.alert-success').removeClass('hide');

                    }
                    else {

                        $('.alert-danger').removeClass('hide');
//                    $('.alert-danger').slideToggle(500);






                    }
                }
            });

        }
    }


</script>

</body>

</html>

