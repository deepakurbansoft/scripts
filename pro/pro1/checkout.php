<?php
extract($_POST);
include("db.php");
session_start();
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];

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

<!--    <link href="bower_components/build.css" rel="stylesheet">-->

    <link href="vendor/pagination/styles.css" rel="stylesheet">
    <link href="vendor/checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>

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
               <a href="index.php"> <img src="img/cbpc_logo.jpg" width="300"></a>
<!--                <a class="navbar-brand" href="#">cashbookpickandclick.com</a>-->
            </div>

            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">

<!--                    <li><a href="#">Home</a></li>-->
<!--                    <li><a href="#">About</a></li>-->
<!--                    <li class="active"><a href="#">Coupons</a></li>-->
                    <li class=""><a href="javascript:;" data-toggle="modal" data-target="#contact_modal">Contact Us</a></li>


                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title" style="margin-top: 50px;">
                    <h2>Order Details</h2><h3 class="pull-right"></h3>
                </div>
                <hr>


                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Payment Method:</strong><br>
                            PayPal<br>

                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            <?php echo date("F j, Y");   ?><br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="paypal/SetExpressCheckout.php" method="post">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td><strong># of coupons purchased</strong></td>
                                    <td><strong>Company Name</strong></td>
                                    <td><strong>Item</strong></td>
                                    <td class="text-right"><strong>Details if any</strong></td>
                                    <td class="text-center"><strong>Value</strong></td>
                                    <td class="text-right"><strong>Price</strong></td>

                                </tr>
                                </thead>
                                <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                <?php
                                $i=1;
//                                var_dump($selected_coupon);
                                foreach ($selected_coupon as $coupon_details) {

                                    $cashbook = 0;

                                    if($coupon_details==0){
                                        $cashbook = number_format(20,2);


                                        ?>

                                        <tr>
                                            <td class="thick-line"><?php $i++;?></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line">Cash Book Coupon Book</td>
                                            <td class="thick-line"></td>

                                            <td class="thick-line text-center"></td>
                                            <input type="hidden" name="product_id[]" value="0">
                                            <td class="thick-line text-right">$20.00</td>
                                        </tr>

                                        <?php



                                    }
                                    $coupon_query = mysql_query("SELECT * FROM `list` WHERE `id` = '$coupon_details'");

                                   if(mysql_num_rows($coupon_query)){

                                    while ($row_coupon = mysql_fetch_assoc($coupon_query)) {

                                        ?>

                                        <tr>
                                            <td>1</td>
                                            <td><?php echo get_cell('company',$row_coupon['company_id'],'name')?></td>
                                            <td><?php echo $row_coupon['item_name']?></td>
                                            <td class="text-right"><?php echo $row_coupon['details']?></td>
                                            <td class="text-center">$<?php echo number_format($row_coupon['dollar_value'],2)?></td>
                                            <input type="hidden" name="product_id[]" value="<?php echo $row_coupon['id'];?>">
                                            <td class="text-right">$<?php echo $total = number_format($row_coupon['coupon_price'],2)?></td>

                                        </tr>

                                        <?php

                                        $total_coupon = $total+$total_coupon;

                                    }
                                   }
                                }


                                ?>

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$<?php echo $main_total = number_format(($cashbook+$total_coupon),2);?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$1.00</td>
                                </tr>


                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$<?php echo $total_grandtotal = number_format(($main_total+1),2)?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <input type="hidden" name="cppheaderimage" id="cppheaderimage"
                               value="http://cashbookpickandclick.com/img/cbpc_logo.jpg" />
                                <input type="hidden" name="itemName[]" id="itemName0"  value="CashBook Pick & Click Coupons" />


                                <input type="hidden" name="itemAmount[]" id="itemAmount0" value="<?php echo $total_grandtotal?>" />


                                <input type="hidden" name="itemQuantity[]" id="itemQuantity0"  value="1" />


<!--                            <input type="hidden" name="itemname" value="CashBook Pick & Click Coupons" />-->
<!--                            <input type="hidden" name="itemnumber" value="10000" />-->
<!--                            <input type="hidden" name="itemdesc" value="CashBook Pick and Click Coupons" />-->
<!--                            <input type="hidden" name="itemprice" id="" value="--><?php //echo $total_grandtotal?><!--" />-->
<!--                            <input type="hidden" name="invoice" id="" value="5000" />-->
<!--                            <input type="hidden" name="itemQuantity" value="1" />-->
                      <div class="pull-right">  E-Mail : &nbsp;<input type="email" name="buyerEmail" id="buyerEmail" required placeholder="Enter Your Email"> &nbsp;&nbsp;  <input type="checkbox" required> I Agree <a href="javascript:;" data-toggle="modal" data-target="#rules_modal">Rules of Use </a>&nbsp;&nbsp; <input type="submit" class="btn btn-primary" value="Pay Now"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div id="rules_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rules Of Use</h4>
            </div>

            <div class="modal-body" style=" padding: 30px; text-align: justify; line-height: 25px;">


                <p><b>COUPON -</b> Please read  each coupon carefully, Coupons may not  be  Combined with any other  discounts or specials, offers are valid  during respective serving hours (breakfast, during breakfast hours, lunch, during lunch hours,  etc..), one coupon may be used per visit, gratuity and  applicable state and local taxes are payable by bearer, Not redeemable  for cash. Coupons excluded tax, tip, alcohol, and sale items.</p>
                <p><b>HOLIDAYS -</b> All holidays (New Year’s Eve, New Year’s Day, Valentine’s Day, St. Patricks Day, Easter Weekend, Memorial Day Weekend, Mother’s Day, Father’s Day, Fourth of July, Labor Day, Thanksgiving, and Christmas) are excluded. Offers not valid during Derby Week or for Derby-related events, if in doubt, please check with the merchant.</p>
                <p><b>DINING IN GROUPS -</b> DINING IN GROUPS: Up to three coupons may be used per party, unless the offer states “one per party or one per table”.</p>
                <p><b>TIPPING -</b> Please base your tip amount on what your check would have been before your discount, A general guideline for tipping is between 15 and 20% of the total bill.</p>
                <p>CASHBOOK SAVINGSTM is published by and is a trademark of Group Marketing Services, Group Marketing Services will not be responsible if any participating merchant refuses to accept, honor or redeem, for any reason, any savings certificate or coupon included in the CASHBOOK SAVINGS BOOK.</p>


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

                <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
                <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
                <!--                <div class="container">-->
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
                <!--                </div>-->



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

    $(".modal").on('show.bs.modal', function () {

        var width = $("#img_44").width();


//       $(".modal-dialog").css('width','1200');

    });
</script>



</body>

</html>

