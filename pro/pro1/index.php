<?php
include("db.php");
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];
include('define_string.php');
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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

    <!-- $ -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/pagination/jquery.quick.pagination.min.js"></script>


    <script type='text/javascript' src='js/loadImg.js'></script>

<!--    <script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>-->

    <script src="js/custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="se-pre-con"></div>

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
<!--                <a class="navbar-brand" href="#">cashbookpickandclick.com</a>-->
            </div>

            <div class="collapse navbar-collapse pull-right">
                <ul class="nav navbar-nav">

<!--                    <li><a href="#">Home</a></li>-->
<!--                    <li><a href="#">About</a></li>-->
<!--                    <li class="active"><a href="#">Coupons</a></li>-->
                    <li><a href="javascript:;" data-toggle="modal" data-target="#contact_modal">Contact Us</a></li>


                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container" >

        <div class="row" style="margin-bottom: 10%;">


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <br><br><br>

                <div class="panel panel-info" >
                    <form method="post" action="checkout.php" onsubmit="return validation()" id="coupon_form" name="coupon_form">
                    <div class="panel-body">

                        <?php

                            $row = mysql_fetch_assoc(mysql_query("select id,coupon_img,dollar_value,coupon_price,company_id,item_name,details from `list` WHERE `featured_home` = 1  LIMIT 1"));
                            $featured_comid = $row['company_id'];
                            $row_company = mysql_fetch_assoc(mysql_query("select * FROM `company` WHERE `id` = '$featured_comid' "));


                        if($row['id']!=''){
                        ?>

                            <h3 style="text-align: center; font-size: 18px; font-weight: bold; padding: 0; margin: 0;">Today's Featured Coupon Deal!</h3>
                        <div class="row" style="margin-top: 10px;">

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                                <div class="checkbox" style="padding-left: 30px;">
                                    <input id="cbpc_checkbox<?php echo $row['id']; ?>" class="styled" type="checkbox" name="selected_coupon[]" value="<?php echo $row['id']; ?>">
                                    <label for="checkbox1">  </label>
                                </div>

                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 featured_img" style="background-image:url(admin/couponimages/<?php echo $row['coupon_img'] ?>); text-align: right;">

                                <?php

                                if($row['details']!=''){
                                    ?>
                                    <span style="position:absolute; bottom: 0;"><a href="javascript:;" style="text-decoration: underline;" data-toggle="modal" data-target="#detail_modal_<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Details</a></span>

<!--                                    <a href="javascript:;" style="text-decoration: underline;" data-toggle="modal" data-target="#detail_modal_--><?php //echo $row['id']; ?><!--" data-id="--><?php //echo $row['id']; ?><!--"> Details </a>-->


                                    <div id="detail_modal_<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content" style="display: block;">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Coupon Details</h4>
                                                </div>

                                                <div class="modal-body" style="padding: 20px;">
                                                    <?php echo $row['details'];?>

                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>


                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="padding-top: 10px;">



                            </div>

                        </div>


                        <hr>
                        <?php } ?>



                        <div class="row" >

                            <div class="col-xs-12">
                             <h3 style="text-align: center; font-size: 18px; font-weight: bold;">Today's Coupon Deals!</h3>
                            </div>
                        </div>

                        <ul  class="pagination3">

						<?php

                            $sel_coupon = "SELECT list.id,list.item_name,list.coupon_price,list.coupon_img,list.dollar_value,list.details,company.name,company.logo FROM `list` INNER JOIN `company` ON list.company_id = company.id AND list.featured_home!= '1' AND `list`.`firstpage_coupon`= '1'  ORDER BY `list`.`id` DESC";

							$res_coupon = mysql_query($sel_coupon);
							 while($row_coupon = mysql_fetch_assoc($res_coupon))
							 {

				        ?>

                            <li>

                                <div class="row couponlist">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0 !important;">

                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-left: 5px !important;">

                                            <div class="checkbox">
                                                <input class="styled" class="sel_coupon" type="checkbox" name="selected_coupon[]" id="cbpc_checkbox<?php echo $row_coupon['id']; ?>" value="<?php echo $row_coupon['id']; ?>">

                                                <label for="checkbox1">    </label>

                                            </div>

                                        </div>

                                        <!--div class="col-xs-3"><img class="img-responsive" src="img/vegetarian-50x50.png"></div-->
                                        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
                                            <img src='admin/companylogos/<?php echo $row_coupon['logo']; ?>' width="80">
                                        </div>

                                        <div class="hidden-xs col-sm-3 col-md-3 col-lg-3" style="padding-top: 10px;">
                                            <span><a style="text-decoration: underline;" href="<?php echo site_url.'/'.str_replace(' ','-',strtolower($row_coupon['name'])); ?>"><?php echo $row_coupon['name']; ?></a></span>
                                        </div>

                                        <div class="col-xs-5 col-sm-6 col-md-5 col-lg-5" style="padding-top: 10px;">

                                            <a href="javascript:;" style="text-decoration: underline;" data-toggle="modal" data-target="#preview_modal_<?php echo $row_coupon['id']; ?>" data-id="<?php echo $row_coupon['id']; ?>"> <?php echo $row_coupon['item_name'].". $".$row_coupon['dollar_value']."&nbsp;Value for a Cost of &nbsp;$".$row_coupon['coupon_price']; ?> </a>

                                            <div id="preview_modal_<?php echo $row_coupon['id']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">


                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal"><img src="img/close_button.png"></button>
                                                            <img src="admin/couponimages/<?php echo $row_coupon['coupon_img']?>" id="img_<?php echo $row_coupon['id']; ?>" class="img-responsive modal_coupon">

                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-top: 10px;">

                                        <?php

                                         if($row_coupon['details']!=''){
                                        ?>
                                            <a href="javascript:;" style="text-decoration: underline;" data-toggle="modal" data-target="#detail_modal_<?php echo $row_coupon['id']; ?>" data-id="<?php echo $row_coupon['id']; ?>"> Details </a>


                                            <div id="detail_modal_<?php echo $row_coupon['id']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content" style="display: block;">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Coupon Details</h4>
                                                        </div>

                                                        <div class="modal-body" style="padding: 20px;">
                                                            <?php echo $row_coupon['details'];?>
<!--                                                            <button type="button" class="close" data-dismiss="modal"><img src="img/close_button.png"></button>-->
<!--                                                            <img src="admin/couponimages/--><?php //echo $row_coupon['coupon_img']?><!--" id="img_--><?php //echo $row_coupon['id']; ?><!--" class="img-responsive modal_coupon">-->

                                                        </div>


                                                    </div>

                                                </div>
                                            </div>

                                            <?php
                                         }
                                            ?>

                                        </div>

                                    </div>

                                </div>

                            </li>


						<?php
						   }
						?>

                        </ul>

                    </div>

                </div>
            </div>

<!--            <div class="col-xs-2 hidden-xs">-->
<!---->
<!--            </div>-->

        </div>
    </div>

</div>



<?php

include('footer.php');
?>



<div id="confirm_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal" style="text-align: left;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm Coupon Book</h4>
            </div>

            <div class="modal-body" style="text-align: left; padding: 30px;">
                <p>Would you like to purchase a Cashbook coupon book for $20?</p>
                <img src="img/coupons/cashbook.jpg" class="img-responsive">
            </div>
            <div class="modal-footer" style="border-radius:">

                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" onclick="cashbook_yes()">Yes</button>

                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" onclick="cashbook_no()">No</button>

            </div>
        </div>

    </div>
</div>

</form>


<div id="contact_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal" style="text-align: left;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>

            <div class="modal-body" style="text-align: left; padding:30px; min-width: 600px;">
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

<!--                <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>-->
<!--                <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>-->
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

    $(document).ready(function(){

        document.getElementById("coupon_form").reset();
        $("#total_value").val(0.00);
        $("#total_amount").val(0.00);

    });

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

                }
            }
        });

    }
}


function cashbook_yes()
{
    $('#couponbook'). attr("checked", "checked");
    document.getElementById("coupon_form").submit();

}

function cashbook_no()
{
    document.getElementById("coupon_form").submit();
}

function validation()
{

        var fields = $("input[name='selected_coupon[]']").serializeArray();
        if (fields.length == 0)
        {
            alert('Please Select Coupon.');
            // cancel submit
            return false;
        }
        else
        {

            $('#confirm_modal').modal('show');
            return false;

        }

    }


</script>



</body>

</html>

