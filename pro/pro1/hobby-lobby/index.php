<?php
include("../db.php");
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 2];
include('../define_string.php');
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

    <script src="../vendor/pagination/jquery.quick.pagination.min.js"></script>

<!--    <script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>-->

    <script src="../js/custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="active"><a href="#">Coupons</a></li>
                    <li><a href="#">Contact Us</a></li>


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

//                            $page_rep = str_replace('-',' ',$page);
                            $company_id = get_cell_value('company','folder_name',$page,'id');

                            $row = mysql_fetch_assoc(mysql_query("select id,coupon_img,dollar_value,coupon_price,company_id,item_name,details from `list` WHERE company_id = '$company_id' AND `featured` = 1 LIMIT 1"));
                            $featured_comid = $row['company_id'];
                            $row_company = mysql_fetch_assoc(mysql_query("select * FROM `company` WHERE `id` = '$company_id' "));


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

                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 featured_img" style="background-image:url(../admin/couponimages/<?php echo $row['coupon_img'] ?>); text-align: right;">

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

//                       $page_rep = str_replace('-',' ',$page);
                        $company_id = get_cell_value('company','folder_name',$page,'id');

                            $sel_coupon = "SELECT list.id,list.item_name,list.coupon_price,list.coupon_img,list.dollar_value,list.details,company.name,company.logo FROM `list` INNER JOIN `company` ON list.company_id = company.id AND company.id = $company_id AND list.featured!= '1' ORDER BY `list`.`id` DESC";


							$res_coupon = mysql_query($sel_coupon);
							 while($row_coupon = mysql_fetch_assoc($res_coupon))
							 {
//								echo $row_coupon['id'];
							// }
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
                                            <img src='../admin/companylogos/<?php echo $row_coupon['logo']; ?>' width="80">
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
                                                            <button type="button" class="close" data-dismiss="modal"><img src="../img/close_button.png"></button>
                                                            <img src="../admin/couponimages/<?php echo $row_coupon['coupon_img']?>" id="img_<?php echo $row_coupon['id']; ?>" class="img-responsive modal_coupon">

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

include('../footer.php');
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
                <p>You want to purchase a coupon book for $20?</p>
                <img src="img/coupons/cashbook.jpg" class="img-responsive">
            </div>
            <div class="modal-footer" style="border-radius:">

                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" onclick="cashbook_yes()">Yes</button>

                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" onclick="cashbook_no()">No</button>

            </div>
        </div>

    </div>
</div>




<script type="application/javascript">

//    $(document).ready(function() {
//        $("ul.pagination3").quickPagination({pagerLocation:"bottom",pageSize:"20"});
//    });

    $("#confirm_modal").on('hide.bs.modal', function () {

//        submit_coupon();


//       $(".modal-dialog").css('width','1200');

    });

function cashbook_yes()
{

    $('#couponbook'). attr("checked", "checked");
    $('#couponbook_selected').val('1');

}

function cashbook_no()
{

    $('#couponbook_selected').val('1');

}

    function validation()
    {

        var fields = $("input[name='selected_coupon[]']").serializeArray();
        if (fields.length === 0)
        {
            alert('Please Select Coupon.');
            // cancel submit
            return false;
        }
        else
        {
            var couponbook_selected = $('#couponbook_selected').val();

            if(couponbook_selected==0){
                $('#confirm_modal').modal('show');
                return false;
            }

//            $('#confirm_modal').modal('show');

//            if (confirm('You want to purchase a coupon book for $25?')) {
//                $('#couponbook'). attr("checked", "checked");
//            } else {
//
//            }
        }
//        alert('failed');
//        return false;
    }
</script>



</body>

</html>

