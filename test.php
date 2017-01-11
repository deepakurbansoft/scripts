<?php
/*
  Plugin Name: IFM Custom Plugin
  Plugin URI: http://ifm.com/
  Description: Integrated custom tasks
  Version: 1.0
  Author: Deepak C | UrbanSoft
  Author URI: http://urbansoft.co
  License: UrbanSoft Technologies
  Text Domain: ifm-custom-plugin
*/

ob_start();

add_shortcode( 'propertyifm', 'property_ifm' );

function property_ifm(){

    page_protect();

	if($_GET['deletepropery']){
		if($_GET['uid']){

			$uidd = $_GET['uid'];

			 $ch = curl_init();// init curl
                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Deleteproperties");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

                    curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$uidd");// post data

// receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

                    curl_close ($ch);// close curl connection

//var_dump($response);

                    $obj = json_decode($response);

//	var_dump($obj);

                    $status = $obj->status;


                    if($status =='success'){

?>
<div >
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; border: 1px solid rgb(61, 158, 17); background: rgb(246, 255, 242) none repeat scroll 0px 0px;">
	Property successfully deleted
	</div>
</div>
<?php
                    }else
					{

						?>
<div style="min-height:400px;">
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; background: rgb(255, 246, 242) none repeat scroll 0px 0px; border: 1px solid rgb(252, 62, 20);">
	Sorry, something went to wrong.
	</div>
</div>
<?php


					}

		}
	}


	 if($_POST['payamount'] )
                {

                    $proid = $_POST['proid'];
                    $mem_id= $_POST['mem_id'];
                    //$homtype= "1";
                    $amount = $_POST['amount'];
                    $card_no = $_POST['card_no'];
                    $card_name = $_POST['card_name'];
                    $exp_month = $_POST['exp_month'];
                    $exp_year = $_POST['exp_year'];
                    $cvv = $_POST['cvv'];



                    $ch = curl_init();// init curl
                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Payment");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

                    curl_setopt($ch, CURLOPT_POSTFIELDS,"proid=$proid&mem_id=$mem_id&amount=$amount&card_no=$card_no&exp_month=$exp_month&exp_year=$exp_year&cvv=$cvv");// post data

// receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

                    curl_close ($ch);// close curl connection

//var_dump($response);

                    $obj = json_decode($response);

//	var_dump($obj);

                    $status = $obj->status;


                    if($status =='success'){

?>
<div >
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; border: 1px solid rgb(61, 158, 17); background: rgb(246, 255, 242) none repeat scroll 0px 0px;">
	Payment success
	</div>
</div>
<?php
                    }else
					{

						?>
<div style="min-height:400px;">
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; background: rgb(255, 246, 242) none repeat scroll 0px 0px; border: 1px solid rgb(252, 62, 20);">
	Sorry, something went to wrong.
	</div>
</div>
<?php


					}

                }
?>

<?php

	 if($_POST['booknow'] )
                {

                    $proid = $_POST['proid'];
                    $mem_id= $_POST['mem_id'];
                    //$homtype= "1";
                    $pac_id = $_POST['pac_id'];



                    $ch = curl_init();// init curl
                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Createpropertypackage");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

                    curl_setopt($ch, CURLOPT_POSTFIELDS,"proid=$proid&mem_id=$mem_id&pac_id=$pac_id");// post data

// receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

                    curl_close ($ch);// close curl connection

//var_dump($response);

                    $obj = json_decode($response);

//	var_dump($obj);

                    $status = $obj->status;


                    if($status =='success'){

?>
<div >
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; border: 1px solid rgb(61, 158, 17); background: rgb(246, 255, 242) none repeat scroll 0px 0px;">
	Our Support team will contact you to verify your subscription!!
	</div>
</div>
<?php
                    }else
					{

						?>
<div style="min-height:400px;">
	<div class="msg1" style="padding: 10px; font-weight: bold; margin-bottom: 15px; background: rgb(255, 246, 242) none repeat scroll 0px 0px; border: 1px solid rgb(252, 62, 20);">
	Sorry, something went to wrong.
	</div>
</div>
<?php


					}

                }
?>
<script>
	jQuery(document).ready(function(){
		jQuery(".msg1").delay(4000).fadeOut();
	})
</script>
<?php


	 if($_POST['addhome']  || $_POST['addhomeskip'])
                {

                    $homname = $_POST['home_name'];
                    $homtype= $_POST['home_type'];
                    //$homtype= "1";
                    $homaddress = $_POST['home_address'];
                    $hommobile = $_POST['home_mobile'];
                    $useridhom= $_POST['user_homeid'];

                    $no_of_rooms = $_POST['home_nom'];
                    $prop_location = $_POST['home_location'];



                    $ch = curl_init();// init curl
                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/CreateProperties");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

                    curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$useridhom&prop_name=$homname&type=$homtype&address=$homaddress&mobile=$hommobile&no_of_rooms=$no_of_rooms&prop_location=$prop_location");// post data

// receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

                    curl_close ($ch);// close curl connection

//var_dump($response);

                    $obj = json_decode($response);

//	var_dump($obj);

                    echo $status = $obj->status;


                    if($status =='success'){

if($_POST['addhomeskip']){
?>
<script>
alert("Your Home Added With No Package ! ");
</script>
<?php

}
else{
	$prop_id = $obj->prop_id;
      wp_redirect('http://ifm2.urbansoft.co/packages?prop_id='.$prop_id);
}
                    }

                }


    $unameid = $_SESSION['user_id'];

    $ch = curl_init();// init curl
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$unameid");// post data

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response = curl_exec ($ch);// response it ouputed in the response var

    curl_close ($ch);// close curl connection

    $obj = json_decode($response);



    ?>

    <div class="modal fade" id="myModal_edit" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form method="post" action="#">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Home Details</h4>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label labname">Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="edithome_name" id="name"  placeholder="Home Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="cols-sm-2 control-label labname">Type</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <!--input type="text" class="form-control" name="home_type" id="type"  placeholder="Home Type"/-->
                                    <select class="form-control" name="edithome_type" id="type">
                                        <option value="">--select--</option>
                                        <option value="1">House</option>
                                        <option value="2">Office</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="cols-sm-2 control-label labname">Address</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-lg"></i></span>
                                    <!--input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Your Mobile"/-->
                                    <textarea name="edithome_address" id="address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="cols-sm-2 control-label labname">Mobile</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile aria-hidden-true"></i></span>
                                    <input type="text" class="form-control" name="edithome_mobile" id="mobile"  placeholder="Your Mobile"/>
                                    <input type="hidden" class="form-control" name="edituser_homeid" id="type"  value="<?php echo $data->prop_id; ?>" placeholder=""/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="cols-sm-2 control-label labname">Number of rooms</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile aria-hidden-true"></i></span>
                                    <input type="text" class="form-control" name="edithome_nom" id="nom"  placeholder="No.of Rooms"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="cols-sm-2 control-label labname">Location</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile aria-hidden-true"></i></span>
                                    <input type="text" class="form-control" name="edithome_location" id="home_location"  placeholder="Your Location"/>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-default pull-right" value="Update Home" name="edithome">

                    </div>
                </div>
            </form>

        </div>
    </div>


    <div class="row">
        <div class="container">

            <div class="col-md-8">
                <p class="hom_top">HOMES</p>
            </div>

            <div class="col-md-2 addcuscolm">

            </div>
        </div>

    </div>

    <div class="row">
        <div class="container">

            <div class="col-md-10">
                <button type="button" class="btn btn-info btn-lg pull-right" style="margin-bottom:2px;" data-toggle="modal" data-target="#myModal">Add New Home</button>

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <form method="post" action="#">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add Your Home Details</h4>
                                </div>
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label labname">Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="home_name" id="name"  placeholder="Home Name"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="type" class="cols-sm-2 control-label labname">Type</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
                                                <!--input type="text" class="form-control" name="home_type" id="type"  placeholder="Home Type"/-->
                                                <select class="form-control" name="home_type" id="type">
                                                    <option value="">--select--</option>
                                                    <option value="1">Commercial Building</option>
                                                    <option value="2">Flat</option>
                                                    <option value="3">Villa</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="cols-sm-2 control-label labname">Address</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-map-marker fa-lg"></i></span>
                                                <!--input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Your Mobile"/-->
                                                <textarea name="home_address" id="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="cols-sm-2 control-label labname">Mobile</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-mobile aria-hidden-true"></i></span>
                                                <input type="text" class="form-control" name="home_mobile" id="mobile"  placeholder="Your Mobile"/>
                                                <input type="hidden" class="form-control" name="user_homeid" id="type"  value="<?php echo $unameid; ?>" placeholder="Home Type"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="cols-sm-2 control-label labname">Number of rooms</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-list-ol aria-hidden-true"></i></span>
                                                <input type="text" class="form-control" name="home_nom" id="nom"  placeholder="No.of Rooms"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile" class="cols-sm-2 control-label labname">Location</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-location-arrow aria-hidden-true"></i></span>
                                                <input type="text" class="form-control" name="home_location" id="home_location"  placeholder="Your Location"/>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-default pull-right" value="Book a Service" name="addhome">
<input type="submit" class="btn btn-default pull-left" value="Add Property" name="addhomeskip">
                                    <!--button type="button" class="btn btn-default pull-left" data-dismiss="modal">Skip</button-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-10">
			  <form name="invitation_form" action="/property-cart/" method="POST" onsubmit="return validation()">
			  <!--<form action="/<?php //if($data->payment_status==1){ echo "category-list"; }elseif($data->payment_status==2){ echo "category-list"; }else{ echo"packages"; }?>/" method="POST">-->
                <?php
                    $paymentpage =0;
                    $countid =1;
                foreach($obj as $data){

                    ?>


                    <div class="panel panel-primary">

                        <div class="panel-heading" style="background-color:#153F91;">
                            <p class="home_name"><?php echo $data->prop_name; ?></p>

                        </div>

                        <div class="panel-body">
                            <div class="row">
							<div class="col-lg-12">
								<div style="text-align:center">
										<?php
										if($data->payment_status==0){
											?>
											<span class="label label-info" style="font-size:16px;padding:2px 5px;">Waiting for approval</span>

											<?php
										}
										elseif($data->payment_status==1){
											?>
											<span class="label label-success" style="font-size:16px;padding:2px 5px;">Property approved</span>

											<?php
										}
										elseif($data->payment_status==2){
											?>
<!--											<span class="label label-success" style="font-size:16px;padding:2px 5px;">Payment success for particular Property</span>-->

											<?php
										}
										elseif($data->payment_status==6){
											?>
											<span class="label label-danger" style="font-size:16px;padding:2px 5px;">Package expired</span>

											<?php
										}
										elseif($data->payment_status==5){
											?>
											<!--<span class="label label-warning" style="font-size:16px;padding:2px 5px;">Package not selected for particular property</span>-->

											<?php
										}
										?>
										</div>
							</div>
                                <div class="col-lg-12">
                                    <div class="col-lg-10">
                                        <p class="home_location"> Location : <?php echo $data->prop_location; ?></p>
                                        <p class="home_location"> Address : <?php echo $data->prop_address; ?></p>
                                        <p class="home_location"> Mobile : <?php echo $data->prop_mobile; ?></p>
                                        <p class="home_location"> Number of Rooms: <?php echo $data->no_of_rooms; ?></p>
                                        <p class="home_location"> Date : <?php echo $data->created_date; ?></p>
                                    </div>
									<?php
										if($data->payment_status==5){
									?>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_edit"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_delete<?php echo $countid; ?>"><span class="glyphicon glyphicon-trash"></button>

										 <div id="myModal_delete<?php echo $countid; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Delete Property</h4>
													</div>
													<div class="modal-body">
														<h3>Are you sure want to delete this propert?</h3>

														<?php $ppid = $data->prop_id ?>

															<a href="/dashboard?deletepropery=1&uid=<?php echo $ppid; ?>">Confirm</a>
															<button type="button" class="close" data-dismiss="modal">No</button>

													</div>
												</div>
												</div>
											</div><!-- delete model content end here -->

                                    </div>
										<?php } ?>
                                </div>
</div>
<div class="row">
                                <div class="pull-right buttonarea">

									<?php
 if($data->payment_status!=0){
									?>
									<?php if($data->payment_status==5){ ?>
											<a style="background:#ee403b;padding:10px; color:white"  class="pull-right" href="/packages?prop_id=<?php echo $data->prop_id; ?>">Book your Package</a>
									<?php }elseif($data->payment_status==2){ ?>
											<a  style="background:#ee403b;padding:10px; color:white" class="pull-right"  href="/category-list?prop_id=<?php echo $data->prop_id; ?>">Book your Service</a>
									<?php } elseif($data->payment_status==1){
									$paymentpage =1;
									?>

												<input type="checkbox" name="pay[]" value="<?php echo $data->prop_id; ?>">&nbsp;Please select to pay for the package
									<?php  } elseif($data->payment_status==6){?>
											<a  style="background:#ee403b;padding:10px; color:white" class="pull-right"  href="/packages?prop_id=<?php echo $data->prop_id; ?>">Book your package</a>
									<?php } ?>

										<input type="hidden" name="prop_id[]" value="<?php echo $data->prop_id; ?>">
                                        <!--<input type="submit"  class="pull-right" value="<?php //if($data->payment_status==1){ echo "Pay"; }elseif($data->payment_status==1){ echo "Select Service"; }elseif($data->payment_status==5){ echo "Book your package"; }else{ echo "Book";  }?>"> -->

 <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                   <?php
				   $countid++;
                }

if($paymentpage==1){
                ?>
				 <input type="submit"  class="pull-right  pay_button" name="submit_pay" value="Pay Now" style="border:1px solid #000;">
<?php } ?>
</form>
<div id="confirm_modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="margin-top: 100px;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal" style="text-align: left; background-color: #000">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;">Property</h4>
            </div>

            <div class="modal-body" style="text-align: left; padding: 30px;">
            <div class="row">
                <div class="col-md-2">
                    <img src="../wp-content/uploads/2016/12/icon_sad.png" class="img-responsive">
                </div>
                 <div class="col-md-10">
                    <p>Please Select Property</p>
                </div>
            </div>


            </div>
            <div class="modal-footer">
<!--                <a href="/dashboard" class="btn btn-default cbpc_btn">Re-Select Property</a>-->
                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" style="margin-bottom: 0px;">Close</button>

            </div>
        </div>

    </div>
</div>

<script>

function validation()
{

      var fields = jQuery("input[name='pay[]']").serializeArray();
        if (fields.length == 0)
        {
             jQuery('#confirm_modal').modal('show');
            // cancel submit
            return false;
        }
        else
        {
            return true;

        }
    }





</script>

            </div>

        </div>
    </div>

    <?php



    if($_POST['edithome'])
    {

        echo $eh_name = $_POST['edithome_name'];
        echo $eh_type = $_POST['edithome_type'];
        echo $eh_address = $_POST['edithome_address'];
        echo $eh_mobile = $_POST['edithome_mobile'];
        echo $eh_nor = $_POST['edithome_nom'];
        echo $eh_location = $_POST['edithome_location'];


    }
}

add_shortcode( 'propertycart', 'property_cart' );

function property_cart(){
	page_protect();

	$unameid = $_SESSION['user_id'];

    $ch = curl_init();// init curl
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$unameid");// post data

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response = curl_exec ($ch);// response it ouputed in the response var

    curl_close ($ch);// close curl connection

    $obj = json_decode($response);

	if($_POST['submit_pay']){

		if(empty($_POST['pay'])){
			?>
			<script>
    window.location = 'http://ifm2.urbansoft.co/dashboard/';
</script>
			<?php
		}

		$id = $_POST['pay'];
		?>
			<h3>Property Cart</h3>
		<?php
	echo '<form method="post" action="/card-details" onsubmit="return validation()">';
		$i =0;
		$amount=0;
		foreach($id as $uid){

			foreach($obj as $pdetails){
				if($uid == $pdetails->prop_id){
					?>
						<input type="hidden" name="proid[]" value="<?php echo $pdetails->prop_id; ?>" />
					<div class="row pcart" style="background:#F6F6F6; padding:10px;margin:5px; border:1px solid #E5E5E5;" >
						<div class="col-md-6">
							<p><span style="font-weight:bold">Property Name: </span><?php echo $pdetails->prop_name; ?></p>
							<p><span style="font-weight:bold">Package: </span><?php echo $pdetails->plan_name; ?></p>

						</div>
						<div class="col-md-6">
							<div class="pull-right">
								<div style="text-align:right">
									<span class="removecart"  style="font-size:16px;color:#EE1C25;cursor:pointer">
										<i class="fa fa-times" aria-hidden="true"></i>
										<input type="hidden" name="amount[]" value="<?php echo $pdetails->amount; ?>" />
									</span>
								</div>
								<p><span style="font-weight:bold">Amount: </span><?php echo $pdetails->amount; ?></p>

							</div>
						</div>
					</div>
					<?php
					$amount = $amount + $pdetails->amount;
				}
				$i++;
			}
			//echo $uid."<br/>";
		}
		?>

			<div class="row" style="background:#F6F6F6; padding:10px;margin:5px; border:1px solid #E5E5E5;">
				<div class="pull-right">
					<p><span style="font-weight:bold;">Total: </span><span class="ta"><?php echo $amount; ?></span><input type="hidden" class="tamount" name="tamount" value="<?php echo $amount; ?>" /></p>
				</div>
			</div>
			<div class="row" style="padding:10px;margin:5px;">
				<div class="pull-right">
					<input class="btn btn-info btn-lg pull-right" type="submit" name="submit" value="Continue" />
				</div>
			</div>

<div id="confirm_modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="margin-top: 100px;">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header couponbook_modal" style="text-align: left; background-color: #000">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #ffffff;">Cart - Empty</h4>
            </div>

            <div class="modal-body" style="text-align: left; padding: 30px;">
            <div class="row">
                <div class="col-md-2">
                    <img src="../wp-content/uploads/2016/12/icon_sad.png" class="img-responsive">
                </div>
                 <div class="col-md-10">
                    <p>Sorry your Cart is Empty.</p>
                </div>
            </div>


            </div>
            <div class="modal-footer">
<!--                <a href="/dashboard" class="btn btn-default cbpc_btn">Re-Select Property</a>-->
                <button type="button" class="btn btn-default cbpc_btn" data-dismiss="modal" style="margin-bottom: 0px;">Close</button>

            </div>
        </div>

    </div>
</div>

			<script>

			function validation()
{

       var tot_amount = jQuery('.tamount').val();
        if (tot_amount == 0)
        {
         jQuery('#confirm_modal').modal('show');

//            alert('Sorry. Your Cart is Empty.');
            // cancel submit
            return false;
        }
        else
        {


        }

    }


		jQuery(document).on('click','.removecart',function() {
			var min_amount = jQuery(this).children('input').val();
			var tot_amount = jQuery('.tamount').val();
			var tot = tot_amount - min_amount;
			jQuery('.tamount').val(tot);
			jQuery('.ta').html(tot);
			 //alert(min_amount + 'Toal amount:' + tot_amount + 'balance:' + tot);

			jQuery(this).closest("div.row").remove();
		});

		</script>
		<?php
		echo '</form>';
	}


}

add_shortcode( 'propertycart1', 'property_cart1' );

function property_cart1(){
	page_protect();

	$unameid = $_SESSION['user_id'];

    $ch = curl_init();// init curl
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$unameid");// post data

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response = curl_exec ($ch);// response it ouputed in the response var

    curl_close ($ch);// close curl connection

    $obj = json_decode($response);

	if($_POST['submit_pay']){

		$id = $_POST['pay'];
		?>
			<h3>Property Cart</h3>
		<?php
	echo '<form method="post" action="/card-details" onsubmit="return validation()">';
		$i =0;
		$amount=0;
		foreach($id as $uid){

			foreach($obj as $pdetails){
				if($uid == $pdetails->prop_id){
					?>
						<input type="hidden" name="proid[]" value="<?php echo $pdetails->prop_id; ?>" />
					<div class="row pcart" style="background:#F6F6F6; padding:10px;margin:5px; border:1px solid #E5E5E5;" >
						<div class="col-md-6">
							<p><span style="font-weight:bold">Property Name: </span><?php echo $pdetails->prop_name; ?></p>
							<p><span style="font-weight:bold">Package: </span><?php echo $pdetails->plan_name; ?></p>

						</div>
						<div class="col-md-6">
							<div class="pull-right">
								<div style="text-align:right">
									<span class="removecart"  style="font-size:16px;color:#EE1C25;cursor:pointer">
										<i class="fa fa-times" aria-hidden="true"></i>
										<input type="hidden" name="amount[]" value="<?php echo $pdetails->amount; ?>" />
									</span>
								</div>
								<p><span style="font-weight:bold">Amount: </span><?php echo $pdetails->amount; ?></p>

							</div>
						</div>
					</div>
					<?php
					$amount = $amount + $pdetails->amount;
				}
				$i++;
			}
			//echo $uid."<br/>";
		}
		?>

			<div class="row" style="background:#F6F6F6; padding:10px;margin:5px; border:1px solid #E5E5E5;">
				<div class="pull-right">
					<p><span style="font-weight:bold;">Total: </span><span class="ta"><?php echo $amount; ?></span><input type="hidden" class="tamount" name="tamount" value="<?php echo $amount; ?>" /></p>
				</div>
			</div>
			<div class="row" style="padding:10px;margin:5px;">
				<div class="pull-right">
					<input class="btn btn-info btn-lg pull-right" type="submit" name="submit" value="Continue" />
				</div>
			</div>



			<script>
		jQuery(document).on('click','.removecart',function() {
			var min_amount = jQuery(this).children('input').val();
			var tot_amount = jQuery('.tamount').val();
			var tot = tot_amount - min_amount;
			jQuery('.tamount').val(tot);
			jQuery('.ta').html(tot);
			 //alert(min_amount + 'Toal amount:' + tot_amount + 'balance:' + tot);

			jQuery(this).closest("div.row").remove();



		});

		</script>
		<?php
		echo '</form>';
	}


}

add_shortcode( 'carddetails', 'card_details' );

function card_details(){
	page_protect();

	$unameid = $_SESSION['user_id'];



	?>
	<h3>Card Details</h3>
	 <form class="form-horizontal" method="post" action="/dashboard" id="invitation_form">
	  <div class="form-group">
		<label class="control-label col-sm-2" for="card_no">Card No :</label>
		<div class="col-sm-10">
		<?php
			$arr = $_POST['proid'];
$pid = implode(",",$arr);
		?>
		<input type="hidden" name="proid" value="<?php echo $pid ?>" />
		<input type="hidden" name="mem_id" value="<?php echo $unameid ?>" />
			<div style="float:left;width:80px;">
				<input type="text" style="width:80px" class="form-control inputscard" name="card_no1" id="card_no1" placeholder="xxxx" minlength=4 maxlength=4 required >
		  </div>

		  <div style="float:left;width:80px;">
			<input type="text" style="width:80px" class="form-control inputscard"  name="card_no2" id="card_no2" placeholder="xxxx" minlength=4 maxlength=4 required >
		  </div>

		  <div style="float:left;width:80px;">
			<input type="text" style="width:80px" class="form-control inputscard" name="card_no3" id="card_no3" placeholder="xxxx" minlength=4 maxlength=4 required >
		  </div>

		  <div style="float:left;width:80px;">
		  <input type="text" style="width:80px" class="form-control inputscard" name="card_no4" id="card_no4" placeholder="xxxx" minlength=4 maxlength=4 required >

		   </div>
		  <div class="clearfix"></div>
		</div>
		<script>
		jQuery(document).ready(function(){
			jQuery(".inputscard").keyup(function () {
				if (this.value.length == this.maxLength) {
				  jQuery(this).next('.inputscard').focus();
				}
			});
})
		</script>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="card_name">Card Holder Name :</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="card_name" id="card_name" placeholder="Enter card holder name "  required >
		</div>

	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="exp_month">Expiry Month :</label>
		<div class="col-sm-4">
		  <select class="form-control" name="exp_month" id="exp_month" >
			<option value="">--</option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		  </select>
		</div>
		<label class="control-label col-sm-2" for="exp_year">Expiry Year :</label>
		<div class="col-sm-4">
		  <select class="form-control" name="exp_year" id="exp_year" >
			<option value="">--</option>
			<?php
				$y=date("Y");
				$end = $y+25;
				for($i=$y;$i<=$end;$i++) {
					?>
				<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php } ?>
		  </select>
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="cvv" >Verification Code :</label>
		<div class="col-sm-10">
<!--		  <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Enter card number" minlength=3 maxlength=3 required>-->
<div class="input-group">
      <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Enter cvv number">
      <span class="input-group-btn">

        <button class="btn btn-default" id="tool_but" type="button" style="background-color: #f6f6f6;border: 1px solid #ccc;color: #000; height: 34px;" data-toggle="tooltip" title="The 3 digit number present on the backside of the card."><i class="fa fa-info"></i></button>

      </span>
    </div><!-- /input-group -->

		</div>
	  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="payamount" class="btn btn-default pull-right" value="Pay Now" >
    </div>
  </div>
</form>

 <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    jQuery(function() {

        // Setup form validation on the #register-form element
        jQuery("#invitation_form").validate({

            // Specify the validation rules
            rules: {
//                email: {
//                    required: true,
//                    email: true
//                },
//                password: {
//                    required: true,
//                    minlength: 5
//                },
                card_no: {
                    required: true,
                    number: true,
					 minlength:16,
					maxlength: 16
                },
				 card_name: "required",
                exp_month: "required",
                exp_year: "required",
                cvv: {
                    required: true,
                    number: true,
					 minlength:3,
					maxlength:3
                }

            },

            // Specify the validation error messages
            messages: {
               card_no: {
                    required: "Please enter card number",
                    minlength: "Your card number must be at least 16 characters long",
					maxlength: "Your card number must be at least 16 characters long"
                },
 card_name: "Please enter card name",
			   exp_month: "Please select card expire month",
                exp_year: "Please select card expire year",
                cvv:  {
                    required: "Please enter cvv number",
                    minlength: "Your card number must be at least 3 characters long",
					maxlength: "Your card number must be at least 3 characters long"
                }

            },

            submitHandler: function(form) {
                form.submit();
            }
        });

    });

      jQuery(document).ready(function() {
        jQuery('[data-toggle="tooltip"]').tooltip();
        });

</script>

	<?php
}

add_shortcode( 'bookarea', 'bookarea' );

function bookarea(){
	?>
	<form method="post" action="http://ifm2.urbansoft.co/booking-area/">
	<input type="text" name="name" value="" />
	<input type="submit" name="submit" value="submit">

	</form>
	<?php
}

add_shortcode( 'categoryifm', 'category_ifm' );

function category_ifm(){
error_reporting(0);
    page_protect();

    $unameid = $_SESSION['user_id'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'http://ifm.urbansoft-googleglass.com/WebService/Category');
    $result = curl_exec($ch);
    curl_close($ch);
//var_dump($result);
    $obj = json_decode($result);

//    $unameid = 69;
    $ch1 = curl_init();// init curl
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch1, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$unameid");// post data

    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response_pro = curl_exec ($ch1);// response it ouputed in the response var

    curl_close ($ch1);// close curl connection

    $obj_prop = json_decode($response_pro);

   foreach($obj_prop as $res){


       if($res->prop_id == $_REQUEST['prop_id']){

		  // echo $res->prop_name.",";
	     $features_array = $res->packages;

          $cat = json_decode($features_array);
		  $cat1 = $cat->feature;
		  $a=array();
			 foreach($cat1 as $pdet=>$pval){

				//echo "Property details:".$pval->feature_id."<br/>";

			array_push($a,$pval->feature_id);

			 }

        }

   }
   //print_r($features_array);

    ?>
    <h3 class="categry_list">Book a Service</h3>
    <?php
    foreach($obj as $data){

        foreach($data as $result) {


            ?>

        <div class="col-sm-3 servicbgimggrid" style="border: 1px solid #ccc;box-shadow: 5px 5px 9px 0;background-size:50%;background-position:center;background-image:url(http://ifm.urbansoft-googleglass.com/<?php echo $result->cat_image; ?>);">
           <?php

    $ch1 = curl_init();// init curl
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch1, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$unameid");// post data

    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response_pro = curl_exec ($ch1);// response it ouputed in the response var

    curl_close ($ch1);// close curl connection


    $obj_prop = json_decode($response_pro);

    foreach($obj_prop as $res){


        if($res->prop_id == $_REQUEST['prop_id']){

            // echo $res->prop_name.",";
            $features_array = $res->packages;

            $cat = json_decode($features_array);
            $cat1 = $cat->feature;
//            $a=array();
//            var_dump($a);
            foreach($cat1 as $pdet=>$pval){

                if($result->cat_id == $pval->feature_id){

                  if($pval->limited =='yes' ){

                ?>

                     <span style="background-color:#153F91; padding:5px; color:#fff; float:right"> <i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $pval->remaining_call;?></span>

            <?php
                  }else{

                  ?>

                   <span style="background-color:#153F91; padding:5px; color:#fff; float:right"><i class="fa fa-star" aria-hidden="true"></i></span>

                  <?php
                  }

?>

<?php
                }

            }

        }

    }



            ?>
            <p class="servcimggridtitle">

                <?php

                    if(in_array($result->cat_id,$a)){



                     ?>
                        <form action="/problem-list" method="POST">

                <input type="hidden" name="cat_id" value="<?php echo $result->cat_id;?>">

                <input type="hidden" name="prop_id" value="<?php echo $_GET['prop_id'];?>">
<!--                            <a href="javascript:;" onclick="check_cat()">--><?php //echo $result->cat_name; ?><!--</a>-->
                        <button type="submit"><?php echo $result->cat_name; ?></button>
                        </form>
                      <?php
                    }else{

                        ?>

                          <button type="button" data-toggle="modal" data-target="#catModal<?php echo $result->cat_id;?>"><?php echo $result->cat_name; ?></button>

                          <div class="modal fade" id="catModal<?php echo $result->cat_id;?>" role="dialog">
                              <div class="modal-dialog">

                                  <!-- Modal content-->
                                  <form method="POST" action="/problem-list">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">IFM</h4>
                                          </div>
                                          <div class="modal-body">


                                              Sorry your package is not suitable for this category. Click continue, it has labour charges.


                                          </div>
                                          <div class="modal-footer">
                                              <input type="hidden" name="cat_id" value="<?php echo $result->cat_id;?>">

                                              <input type="hidden" name="prop_id" value="<?php echo $_GET['prop_id'];?>">

                                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-default pull-right" value="Continue" name="continue">

                                          </div>
                                      </div>
                                  </form>

                              </div>
                          </div>


                          <?php
                    }



                ?>


                </p></div>

                <?php

        }
    }

    ?>


    <?php

    function get_calldetails($user_id,$prop_id,$cat_id){

    $ch1 = curl_init();// init curl
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch1, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$user_id");// post data

    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response_pro = curl_exec ($ch1);// response it ouputed in the response var

    curl_close ($ch1);// close curl connection

//    var_dump($response_pro);

//$obj_prop = json_decode($response_pro);

    $obj_prop = json_decode($response_pro);

    foreach($obj_prop as $res){


        if($res->prop_id == $prop_id){

            // echo $res->prop_name.",";
            $features_array = $res->packages;

            $cat = json_decode($features_array);
            $cat1 = $cat->feature;
            $a=array();
            foreach($cat1 as $pdet=>$pval){

                if($cat_id == $pval->feature_id)

                echo $pval->remaining_call;

            }

        }

    }
}

}

add_shortcode( 'packages_alert', 'packages_alert' );

function packages_alert(){


    page_protect();

	 if($_POST['booknow'] )
                {

                    $proid = $_POST['proid'];
                    $mem_id= $_POST['mem_id'];
                    //$homtype= "1";
                    $pac_id = $_POST['pac_id'];



                    $ch = curl_init();// init curl
                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Createpropertypackage");
                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

                    curl_setopt($ch, CURLOPT_POSTFIELDS,"proid=$proid&mem_id=$mem_id&pac_id=$pac_id");// post data

// receive server response ...
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

                    curl_close ($ch);// close curl connection

//var_dump($response);

                    $obj = json_decode($response);

//	var_dump($obj);

                    $status = $obj->status;


                    if($status =='success'){

?>
<div style="min-height:400px;">
	<div style="border:1px solid #52E89E; padding:10px;">
	Thanks for choosing package, you can pay after verification. go to <a href="/user-profile">My Account</a>
	</div>
</div>
<?php
                    }else
					{

						?>
<div style="min-height:400px;">
	<div style="border:1px solid #52E89E; padding:10px;">
	Sorry, something went to wrong.
	</div>
</div>
<?php


					}

                }

}

add_shortcode( 'packages', 'packages_list' );

function packages_list(){


    page_protect();



	$prop_id=$_REQUEST['prop_id'];
    $unameid = $_SESSION['user_id'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'http://ifm.urbansoft-googleglass.com/WebService/Packages');
    $result = curl_exec($ch);
    curl_close($ch);
//var_dump($result);
    $obj = json_decode($result);


    ?>

    <style type="text/css">

        .db-bk-color-one{
            background-color: #153F91;
        }

        .db-bk-color-two {
            background-color: #46A6F7;
        }

        .db-bk-color-three {
            background-color: #47887E;
        }

        .db-bk-color-six {
            background-color: #F59B24;
        }
        /*============================================================
        PRICING STYLES
        ==========================================================*/
        .db-padding-btm {
            padding-bottom: 50px;
        }
        .db-button-color-square {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.50);
            border: none;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
        }

        .db-button-color-square:hover {
            color: #fff;
            background-color: rgba(0, 0, 0, 0.50);
            border: none;
        }


        .db-pricing-eleven {
            margin-bottom: 30px;
            margin-top: 50px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, .5);
            color: #fff;
            line-height: 30px;
        }

        .db-pricing-eleven ul {
            list-style: none;
            margin: 0;
            text-align: center;
            padding-left: 0px;
            /*max-height: 280px;
            overflow: hidden;*/
        }

        .db-pricing-eleven ul li {
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: pointer;
        }

        .db-pricing-eleven ul li i {
            margin-right: 5px;
        }


        .db-pricing-eleven .price {
           /* background-color: rgba(0, 0, 0, 0.5);*/
            padding: 20px;
            font-size: 28px;
            font-weight: normal;
            color: #FFFFFF;
        }

        .db-pricing-eleven .price small {
            color: #B8B8B8;
            display: block;
            font-size: 12px;
            margin-top: 22px;
        }

        .db-pricing-eleven .type {
            background-color: #52E89E;
            padding: 20px;
            font-weight: normal;
            text-transform: uppercase;
            font-size: 35px;
        }

        .db-pricing-eleven .pricing-footer {
            padding: 20px;
        }

        .db-attached > .col-lg-4,
        .db-attached > .col-lg-3,
        .db-attached > .col-md-4,
        .db-attached > .col-md-3,
        .db-attached > .col-sm-4,
        .db-attached > .col-sm-3 {
            padding-left: 0;
            padding-right: 0;
        }

        .db-pricing-eleven.popular {
            margin-top: 10px;
        }

        .db-pricing-eleven.popular .price {
            padding-top: 80px;
        }

    </style>

    <h3 class="categry_list">Book a Package</h3>

    <div class="container">


  <div class="row db-padding-btm db-attached">

      <?php
      $color = array("one","two","three","six");
      $i = 0;
      foreach($obj as $data){

          foreach($data as $result){

              $ran =  rand(1, 3);

      ?>

    <div class="col-xs-12 col-sm-1 col-md-4 col-lg-4 mid package<?php echo $i; ?>">
        <div class="db-wrapper">
            <div class="db-pricing-eleven db-bk-color-one">
                  <div class="type">
                    <?php echo $result->package_name;?>
                </div>
                <div class="price">
                    BD <?php echo $result->price;?>/-  Per Annum

                </div>

                <ul>

                    <?php
                        foreach($result->feature as $get_feature ) {


                            ?>
                            <li><?php echo $get_feature->cat_name;?></li>
                            <?php
                        }
                     ?>
<!--                    <li><i class="glyphicon glyphicon-time"></i>--><?php //echo $result->features;?><!-- </li>-->
<!--                    <li><i class="glyphicon glyphicon-trash"></i>Lead Required</li>-->
                </ul>
                <div class="pricing-footer">

<form method="post" action="/dashboard">
	<input type="hidden" name="proid" value="<?php echo $prop_id ?>" />
	<input type="hidden" name="mem_id" value="<?php echo $unameid ?>" />
	<input type="hidden" name="pac_id" value="<?php echo $result->pack_id ?>" />
	<input type="submit" class="btn db-button-color-square btn-lg " name="booknow" value="Book Now" />
	<!--<a href="#" class="btn db-button-color-square btn-lg">Add Home</a>-->
</form>


                </div>
            </div>
        </div>
    </div>

      <?php
              $i++;
        }
      }
      ?>

  </div>


    </div>


            <?php


}

add_shortcode( 'problemifm', 'problem_ifm' );

function problem_ifm(){

    page_protect();

    ?>

    <style type="text/css">

        .content h1 {
            text-align: center;
        }
        .content .content-footer p {
            color: #6d6d6d;
            font-size: 12px;
            text-align: center;
        }
        .content .content-footer p a {
            color: inherit;
            font-weight: bold;
        }

        /*	--------------------------------------------------
            :: Table Filter
            -------------------------------------------------- */
        .panel {
            border: 1px solid #ddd;
            background-color: #fcfcfc;
        }
        .panel .btn-group {
            margin: 15px 0 30px;
        }
        .panel .btn-group .btn {
            transition: background-color .3s ease;
        }
        .table-filter {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .table-filter tbody tr:hover {
            cursor: pointer;
            background-color: #eee;
        }
        .table-filter tbody tr td {
            padding: 10px;
            vertical-align: middle;
            border-top-color: #eee;
        }
        .table-filter tbody tr.selected td {
            background-color: #eee;
        }
        .table-filter tr td:first-child {
            width: 38px;
        }
        .table-filter tr td:nth-child(2) {
            width: 35px;
        }
        .ckbox {
            position: relative;
        }
        .ckbox input[type="checkbox"] {
            opacity: 0;
        }
        .ckbox label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .ckbox label:before {
            content: '';
            top: 1px;
            left: 0;
            width: 18px;
            height: 18px;
            display: block;
            position: absolute;
            border-radius: 2px;
            border: 1px solid #bbb;
            background-color: #fff;
        }
        .ckbox input[type="checkbox"]:checked + label:before {
            border-color: #2BBCDE;
            background-color: #2BBCDE;
        }
        .ckbox input[type="checkbox"]:checked + label:after {
            top: 3px;
            left: 3.5px;
            content: '\e013';
            color: #fff;
            font-size: 11px;
            font-family: 'Glyphicons Halflings';
            position: absolute;
        }
        /*.table-filter .star {*/
        /*color: #ccc;*/
        /*text-align: center;*/
        /*display: block;*/
        /*}*/
        /*.table-filter .star.star-checked {*/
        /*color: #F0AD4E;*/
        /*}*/
        /*.table-filter .star:hover {*/
        /*color: #ccc;*/
        /*}*/
        /*.table-filter .star.star-checked:hover {*/
        /*color: #F0AD4E;*/
        /*}*/
        /*.table-filter .media-photo {*/
        /*width: 35px;*/
        /*}*/
        /*.table-filter .media-body {*/
        /*display: block;*/

        /*}*/
        /*.table-filter .media-meta {*/
        /*font-size: 11px;*/
        /*color: #999;*/
        /*}*/
        /*.table-filter .media .title {*/
        /*color: #2BBCDE;*/
        /*font-size: 14px;*/
        /*font-weight: bold;*/
        /*line-height: normal;*/
        /*margin: 0;*/
        /*}*/
        /*.table-filter .media .title span {*/
        /*font-size: .8em;*/
        /*margin-right: 20px;*/
        /*}*/
        /*.table-filter .media .title span.pagado {*/
        /*color: #5cb85c;*/
        /*}*/
        /*.table-filter .media .title span.pendiente {*/
        /*color: #f0ad4e;*/
        /*}*/
        /*.table-filter .media .title span.cancelado {*/
        /*color: #d9534f;*/
        /*}*/
        /*.table-filter .media .summary {*/
        /*font-size: 14px;*/
        /*}*/

    </style>

    <h3 class="categry_list">General Problems</h3>

    <div class="container">
        <div class="row">

            <section class="content">

                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="table-container">
                                <form method="POST" action="/raise-ticket" onsubmit="return validation()">
                                <table class="table table-filter">
                                    <tbody>

                                    <?php

                                    $unameid = $_SESSION['user_id'];
                                    $category_id = $_POST['cat_id'];


                                    $ch = curl_init();// init curl
                                    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/GeneralProblems");
                                    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
                                    curl_setopt($ch, CURLOPT_POSTFIELDS,"catid=$category_id");// post data

                                    // receive server response ...
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

                                    $response = curl_exec ($ch);// response it ouputed in the response var

                                    //var_dumb($response);

                                    curl_close ($ch);// close curl connection

                                    //var_dump($response);
                                    $obj = json_decode($response);
                                    $i = 0;
                                    foreach($obj as $result){


                                        ?>

                                        <tr data-status="pagado" style="width: 50%; float: left;">

                                            <td>
                                                <div class="ckbox">
                                                    <input type="checkbox" id="checkbox<?php echo $i; ?>" name="ids[]" value="<?php echo $result->scat_id; ?>">
                                                    <label for="checkbox<?php echo $i; ?>"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="javascript:;" class="star">
                                                    <!--                <i class="glyphicon glyphicon-star"></i>-->
                                                </a>
                                            </td>

                                            <td>
                                                <div class="media">
                                                    <a href="#" class="pull-left" style="width: 20%;">
                                                        <img src="http://ifm.urbansoft-googleglass.com/<?php echo $result->scat_image; ?>" alt="problem image" width="128" class="media-photo" />
                                                        <!--                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">-->
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="media-meta pull-right" style="font-size: 12px;"><?php echo $result->updated_date;?></span>
                                                        <h4 class="title" style="font-size: 14px;">
                                                            <?php echo $result->scat_title; ?>
                                                            <!--                        <span class="pull-right pagado">(Pagado)</span>-->
                                                        </h4>
                                                        <p class="summary" style="font-size: 10px;"><?php echo $result->scat_desc; ?></p>
                                                    </div>
                                                </div>
                                            </td>



                                        </tr>

                                        <?php

                                        $result->scat_id;
                                        $i++;
                                    }
                                    ?>

                                    </tbody>
                                </table>
                                    <input type="hidden" name="prop_id" value="<?php echo $_POST['prop_id'];?>">
                                    <input type="hidden" name="cat_id" value="<?php echo $_POST['cat_id'];?>">
                                <div>
                                    <span>Other Problems</span>
                                    <textarea name="otherproblem" class="" id="" style="margin:5px 0px 10px 0px" required></textarea>
                                </div>
                                <div>
                                    <span>Description</span>
                                    <textarea name="prob_desc" class="" id="" style="margin:5px 0px 10px 0px" required></textarea>
                                </div>
								<div>
                                        <span>Upload Image</span>
                                        <input name="photo" style="margin:5px 0px 10px 0px" type="file">
                                    </div>
                                <button type="submit" class="pull-right">Raise Ticket</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </section>

        </div>
    </div>

    <script type="application/javascript">

        function validation(){


            var fields = jQuery("input[name='ids[]']").serializeArray();

            if (fields.length == 0)
            {
                alert('Please Select Problem.');
                // cancel submit
                return false;
            }
            else
            {
                return true;
            }
        }
    </script>
    <?php


}

add_shortcode( 'raise-ticket', 'raise_ticketifm' );

function raise_ticketifm(){

    page_protect();

    $ids = '';
    foreach($_POST['ids'] as $problem_id ){
        $ids.=$problem_id.',';
    }
    $userid  = $_SESSION['user_id'];
    $categoryid = $_POST['cat_id'];
    $property_id = $_POST['prop_id'];
    $description = $_POST['prob_desc'];
    $otherproblem = $_POST['otherproblem'];


    $ch = curl_init();// init curl
    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/CreateTickets");
    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch, CURLOPT_POSTFIELDS,"categoryid=$categoryid&userid=$userid&property_id=$property_id&ids=$ids&is_gust=0&description=$description&otherproblem=$otherproblem");// post data

    // receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response = curl_exec ($ch);// response it ouputed in the response var

    //var_dumb($response);

    curl_close ($ch);// close curl connection

//    var_dump($response);

    ?>



    <h3 class="categry_list">Raise Ticket</h3>

    <div class="container">
        <div class="row">

            <section class="content">

                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="table-container">
                            <img src="http://ifm2.urbansoft.co/wp-content/uploads/2016/12/success.jpg"> Your Ticket has been raised. <a href="/user-profile"> Click here </a> to My Account.

                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <?php


}

add_shortcode( 'userprofileifm', 'userprofile_ifm' );

function userprofile_ifm(){

page_protect();

 $loginuserid = $_SESSION['user_id'];




if($_POST['edit'])
{

$name = $_POST['edit_uname'];
$mobile = $_POST['edit_mobile'];

//echo "<div style='margin-top:200px'>Name".$name." ".$mobile."</div>"; die;

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/EditProfile");
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$loginuserid&name=$name&mobile=$mobile");

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$edit_response = curl_exec ($ch1);

$obj1 = json_decode($edit_response);
curl_close ($ch1);


}


$ch = curl_init();// init curl
curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Profile");
curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$loginuserid");// post data

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

$response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

curl_close ($ch);// close curl connection




$obj = json_decode($response);
//var_dump($response);

//transaction history
$ch = curl_init();// init curl
curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/TransactionHistory");
curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
curl_setopt($ch, CURLOPT_POSTFIELDS,"user_id=$loginuserid");// post data

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

$response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

curl_close ($ch);// close curl connection

//var_dump($response);


$trans_his_obj = json_decode($response);


//My Tickets
$ch = curl_init();// init curl
curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/MyTickets");
curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$loginuserid");// post data

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

$response_mytickets = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

curl_close ($ch);// close curl connection

//var_dump($response);


$result_mytickets = json_decode($response_mytickets);

//Properties
$ch = curl_init();// init curl
curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
curl_setopt($ch, CURLOPT_POSTFIELDS,"id=$loginuserid");// post data

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

$response_properties = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

curl_close ($ch);// close curl connection

//var_dump($response);


$result_properties = json_decode($response_properties);

//var_dump($result_properties);

?>

<style type="text/css">

.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
	color: #EE1C25;
	background-color: #3071a9;
	border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
	color: #EE1C25;
	background-color: #fff;
	border-color: #EE1C25;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
}

</style>

<div class="col-md-12"><!--h1 class="userprofl_titl">User Details</h1--></div>
<div class="container userprofile">
    <div class="row">
        <div class="col-sm-12">
          <h3 class="acc_overview">Account Overview</h3>
        </div>
     </div>
<div class="row">
    <div class="col-sm-3">

        <ul class="nav nav-pills nav-stacked nav-email shadow mb-20 profile_sidemenu">

            <li class="welcome_name">
            Welcome, <?php echo $obj->name; ?>
            </li>

             <li class="">
           <a href="/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
            </li>

            <li class="active">
           <a href="#userprofile" data-toggle="tab"><i class="fa fa-user"></i> Profile</a>
            </li>

            <li>
                <a href="#mypackage" data-toggle="tab"><i class="fa  fa-shopping-bag"></i> My Package</a>
            </li>

            <li class="">
                 <a href="/dashboard"><i class="fa fa-caret-square-o-up"></i> Raise Ticket</a>
            </li>

            <li>
                <a href="#myrequest" data-toggle="tab"><i class="fa fa-ticket "></i> My Tickets</a>
            </li>
			<li>
                <a href="#changepwd" data-toggle="tab"><i class="fa fa-key "></i> Change Password</a>
            </li>

<!--			  <li>-->
<!--                <a href="#mytransactionhistory" data-toggle="tab"><i class="fa fa-sign-out"></i> Transaction History</a>-->
<!--            </li>-->



<!--            <li>-->
<!--            <a href="#" data-toggle="tab"> <i class="fa fa-tags"></i> Offers</a>-->
<!--            </li>-->

            <li>
            <a href="#" data-toggle="tab"> <i class="fa fa-external-link"></i> Logout</a>
            </li>
        </ul><!-- /.nav -->
    </div>
    <div class="col-sm-9">

        <!-- resumt -->

        <div class="panel panel-default panel_customstyl">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12 tab-content">

					 <div class="tab-pane active" id="userprofile">

                        <h4 class="tabtitle_txt">Profile <a href="javascript:;" data-toggle="modal" data-target="#myModal"> <span style="float:right;font-size: 17px;color: #000;"><i class="fa fa-pencil"></i></span></a></h4>
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                              <img class="img-circle img-responsive" style="border: 1px solid #cccccc;" alt="IFM_Profile_img" src="http://ifm.urbansoft-googleglass.com/<?php echo $obj->photo; ?>">
                           </figure>
                           <br>
	                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-phone"></i> Calls : <?php echo $obj->total_calls; ?></button>
					<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-phone"></i> Remaining : <?php echo $obj->remaining_calls; ?></button>

                        </div>
                        <div class="col-xs-12 col-sm-8">

						<br/>
                           <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-user"></i> <?php echo $obj->name; ?></li>
                              <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo $obj->phone; ?></li>
                              <li class="list-group-item"><i class="fa fa-envelope"></i> <?php echo $obj->email; ?></li>
                           </ul>
                        </div>
			<div class="col-xs-12 col-sm-8" style="padding-left: 45px;">

			</div>

            <div class="row">
                <div class="col-lg-12">
                   <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading" style="padding: 10px 10px 0px 10px !important; border-bottom: 0px; background-color: #153F91;">
                    <ul class="nav nav-tabs" style="border-bottom: 0px;">
                        <li class="active"><a href="#tab1primary" data-toggle="tab">Properties</a></li>
<!--                        <li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>-->
<!--                        <li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>-->

                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">


                          <table class="table servc_detailtable" id="myTable" class="table table-striped">
						<thead>
						  <tr>
                           <th>Sl.No</th>
                           <th>Prop Name</th>
                           <th>Location</th>
                           <th>Address</th>
                           <th>Mobile</th>
                           <th>Package</th>
                           <th>Expiry</th>
						  </tr>
						</thead>
						<tbody>
                        <?php
                        $i=1;
                            foreach($result_properties as $get_prop ){

                               ?>
                               <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $get_prop->prop_name;?></td>
                               <td><?php echo $get_prop->prop_location;?></td>
                               <td><?php echo $get_prop->prop_address;?></td>
                               <td><?php echo $get_prop->prop_mobile;?></td>
                               <td>
                               <a href="#" data-toggle="tooltip" title="<?php $json_packages = $get_prop->packages;
                               if($json_packages!=''){
                                $cat = json_decode($json_packages);
		                         $cat1 = $cat->feature;

                                     foreach($cat1 as $pdet=>$pval){

                                         echo $pval->feature_name.',';

                                 }
                                }
                               ?>">
                               <?php echo $get_prop->plan_name;?></a>
                               </td>
                               <td><?php echo $get_prop->expiry_date;?></td>
                               <td></td>

                               </tr>
                               <?php
                               $i++;
                            }
                        ?>

						</tbody>
					  </table>


                        </div>

                    </div>
                </div>
            </div>
                </div>

            </div>

			</div>
			<!--service Request-->
			<div class="tab-pane" id="servicerequest">
                            <div class="bs-callout bs-callout-danger">
                  <h4 class="tabtitle_txt">Services</h4>

                    <table class="table servc_detailtable" id="myTableservc" class="table table-striped">
						<thead>
						  <tr>
                           <th>Id</th>
                           <th>User Name</th>
                           <th>Service</th>
						  </tr>
						</thead>
						<tbody>
						   <tr>
                           <td>1</td>
                           <td>kaveri</td>
                           <td>Lorem</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>vidya</td>
                           <td>Lorem</td>
                        </tr>
						</tbody>
					  </table>

               </div>
            </div><!--service Request--><!--my equest-->

            <div class="tab-pane" id="myrequest">
                  <div class="bs-callout bs-callout-danger"><h4 class="tabtitle_txt">My Tickets</h4>

                 <table class="table servc_detailtable" id="myTable" class="table table-striped">
						<thead>
						  <tr>
                           <th>Sl.No</th>
                           <th>Category</th>
                           <th>Ticket No</th>
                           <th>Approval Status</th>
                           <th>Status</th>
                           <th>Date & Time</th>
                           <th>Description</th>
						  </tr>
						</thead>
						<tbody>
                        <?php
                        $i=1;
                            foreach($result_mytickets as $get_ticket){

                               ?>
                               <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $get_ticket->category;?></td>
                               <td><?php echo $get_ticket->ticket_number;?></td>
                               <td><?php if($get_ticket->approval_flag==1){ echo '<span style="color: #b71c1c">Approval Pending</span>';}else{echo '<span style="color: #cddc39">Approved</span>';}?></td>
                               <td><?php if($get_ticket->ticket_status_id==1){echo '<span style="color: #1b5e20">New</span>';}elseif($get_ticket->ticket_status_id==2){echo '<span style="color: #ff5722">Open</span>';}elseif($get_ticket->ticket_status_id==3){echo '<span style="color: #009688">Completed</span>';}elseif($get_ticket->ticket_status_id==4){echo '<span style="color: #d50000">Canceled</span>';}elseif($get_ticket->ticket_status_id==5){echo '<span style="color: #ff5722">Deleted</span>';}elseif($get_ticket->ticket_status_id==6){echo '<span style="color: #00bcd4">In Progress</span>';}?></td>
                               <td><?php echo $get_ticket->created_date;?></td>
                               <td><?php echo $get_ticket->description;?></td>
                               </tr>
                               <?php
                               $i++;
                            }
                        ?>

						</tbody>
					  </table>

               </div>
            </div><!--my request-->

			<div class="tab-pane" id="mytransactionhistory">
                <h4 class="tabtitle_txt">Transaction History</h4>

                  <div class="col-xs-12">

					<table class="table servc_detailtable" id="myTabletransaction" class="table table-striped">
						<thead>
						  <tr>
                           <th>Transaction Id</th>
                           <th>User Name</th>
                           <th>Amount</th>
                           <th>Status</th>
						  </tr>
						</thead>
						<tbody>
						   <tr>
                           <td>1</td>
                           <td>Kaveri</td>
                           <td>20</td>
                           <td>Success</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Vidya</td>
                           <td>90</td>
                           <td>Processing</td>
                        </tr>
						</tbody>
					  </table>


                  </div>
			</div>

			<!--my package-->
			<div class="tab-pane" id="mypackage">
			<h4 class="tabtitle_txt">My Packages</h4>
			<div class="bs-callout bs-callout-danger">
                 <table class="table servc_detailtable" id="myTablepackage" class="table table-striped">
						<thead>
						  <tr>
                           <th>Id</th>
                           <th>Package Name</th>
                           <th>Price</th>
						  </tr>
						</thead>
						<tbody>
						<?php
						$sno=1;
							foreach($result_properties as $get_prop ){
								if($get_prop->plan_name){
								?>
								<tr>
								   <td><?php echo $sno; ?></td>
								   <td> <?php echo $get_prop->plan_name;?></td>
								   <td><?php echo $get_prop->amount;?></td>
								</tr>
								<?php
								$sno++;
								}
							}
						?>

                        <!--<tr>
                           <td>2</td>
                           <td>Premium</td>
                           <td>90</td>
                        </tr>-->
						</tbody>
					  </table>

               </div>
            </div>
			<!--my package-->

			<!-- start change password -->
			<div class="tab-pane" id="changepwd">




                        <h4 class="tabtitle_txt">Change Password</h4>
                        <form class="form-horizontal" method="post" name="change-pass-form" id="change-pass-form">
                        <input type="hidden" name="loginuserid" id="loginuserid" value="<?php echo $loginuserid;?>">
							  <div class="form-group">
								<label class="control-label col-sm-2" for="old_pwd">Old Password:</label>
								<div class="col-sm-10">

								  <input type="password" class="form-control" name="old_pwd" id="old_pwd" placeholder="Please enter your old password">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-sm-2" for="pwd">Password:</label>
								<div class="col-sm-10">
								  <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Please enter new password">
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
								<div class="col-sm-10">
								  <input type="password" class="form-control" id="cpwd" placeholder="Please confirm password">
								</div>
							  </div>


							 <div class="alert alert-danger" style="display: none;" role="alert"></div>
                                <div class="alert alert-success" style="display: none;" role="alert"></div>
							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <!--input type="submit" name="pwdchange" class="btn btn-default" value="Change" -->
								  <input type="button" name="pwdchange" id="ifmuserchangepwd" class="btn btn-default pull-right" value="Change">
								</div>
							  </div>
							</form>
			</div>
<!-- change password end -->

                     </div>
                  </div>
               </div>



<script>
jQuery(document).ready(function(){

jQuery("#ifmuserchangepwd").click(function(e) {

jQuery.ajax({

type: 'POST',
            url: '/web-services/change-password.php',
            data: jQuery('#change-pass-form').serialize(),
            dataType  : 'json',

}).done(function(data){

if(data.status=='failure'){
    jQuery('.alert-danger').css('display','block');
    jQuery('.alert-success').css('display','none');
    jQuery('.alert-danger').html(data.message);
}else{
    jQuery('.alert-danger').css('display','none');
    jQuery('.alert-success').css('display','block');
    jQuery('.alert-success').html(data.message);
}


});



});


});


</script>


        </div>
    </div>
        <!-- resume -->

    </div>
</div>

<!--model-->
<div class="modal fade editprofile" id="myModal" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <div class="modal-body">
         <form class="form-signin" method="post" action="" name="edit_form" id="edit_form">
        <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
        <div class="">
        <div class="">

            <h3 class="text-center">
                        Update my information</h3>

        <div class="panel-body">
        <div class="msg"></div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                            </span><input type="text" class="form-control" placeholder="User Name" name="edit_uname" value="<?php echo $obj->name; ?>"/>
                        </div>
                    </div>
                    <!--div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span><input type="text" class="form-control" placeholder="Email" />
                        </div>
                    </div-->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text" class="form-control" placeholder="Phone number" name="edit_mobile" value="<?php echo $obj->phone; ?>"/>
                        </div>
                    </div>

<!--                        <button class="btn btn-primary pull-right" onclick="edit_user()">Update</button>-->
<!--                        <a href="javascript:;" onclick="edit_user()" class="btn btn-primary pull-right">Update</a>-->
<input class="btn btn-primary pull-right" type="submit" name="edit" Value="Update" /></div>
       </div>
        </div>
    </div>
</div>
</form>
        </div>

      </div>

    </div>
  </div>

</div>
<!--model-->

<!-- transaction model-->
<div class="modal fade editprofile" id="myModaltransaction" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Transaction History</h4>
        </div>
        <div class="modal-body">
				<table class="table servc_detailtable" id="myTabletransaction" class="table table-striped">
						<thead>
						  <tr>
                           <th>Transaction Id</th>
                           <th>User Name</th>
                           <th>Amount</th>
                           <th>Status</th>
						  </tr>
						</thead>
						<tbody>
						   <tr>
                           <td>1</td>
                           <td>Kaveri</td>
                           <td>20</td>
                           <td>Success</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Vidya</td>
                           <td>90</td>
                           <td>Processing</td>
                        </tr>
						</tbody>
					  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
<!-- transaction model -->


<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<!--<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>-->
<!--<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>-->

<script type="text/javascript">


       // jQuery(document).ready(function() {


// jQuery('[data-toggle="tooltip"]').tooltip();

           // jQuery('#edit_form').submit(function(event) {
            // // stop the form from submitting the normal way and refreshing the page
               // event.preventDefault();


               // var formData = {
                   // 'id'              : <?php echo $loginuserid ?>,
                   // 'name'              : jQuery('input[name=edit_uname]').val(),
                   // 'mobile'             : jQuery('input[name=edit_mobile]').val(),

               // };

               // jQuery.ajax({
                       // type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                       // url         : 'http://ifm.urbansoft-googleglass.com/WebService/EditProfile', // the url where we want to POST
                       // data        : formData, // our data object
                       // jsonp: "jsonpcallback",
                       // dataType    : "jsonp" // what type of data do we expect back from the server

                   // })
                   // // using the done promise callback
                   // .done(function(data) {
// window.location.href = "/user-profile";
                       // // log data to the console so we can see
                       // console.log(data);

                       // // here we will handle errors and validation messages
                       // if (data.status !="success") {
                               // jQuery('.msg').html('<div >sorry something went to wrong</div>');

                       // } else {

                         // window.location.href = "http://ifm2.urbansoft.co/user-profile/";
                           // // usually after form submission, you'll want to redirect
                           // // window.location = '/thank-you'; // redirect a user to another page
                          // // for now we'll just alert the user

                       // }
                   // });


           // });

       // });
   </script>

<?php


}

add_shortcode( 'carouselifm', 'carousel_ifm' );

function carousel_ifm(){

//echo "hi";

?>

<div class="container ifmcarousel">
    <div class="row">
		<div class="col-md-12">
                <div id="Carousel" class="carousel slide">

                <!--ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol--->

                <!-- Carousel items -->
                <div class="carousel-inner">

                <div class="item active">
                	<div class="row">
                	  <div class="col-md-3"><a href="/facility-management/" class="thumbnail"><img src="/wp-content/uploads/2016/09/civil.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="/fitouts-project-works/" class="thumbnail"><img src="/wp-content/uploads/2016/09/fitout.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="/electrical-maintenance-service/" class="thumbnail"><img src="/wp-content/uploads/2016/09/Electrical.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/09/Plumbing.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->

                <div class="item">
                	<div class="row">
                		<div class="col-md-3"><a href="/ac-maintenance-service/" class="thumbnail"><img src="/wp-content/uploads/2016/09/HVAC.png" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="/house-keeping/" class="thumbnail"><img src="/wp-content/uploads/2016/09/house_keeping.png" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="/landscaping-and-pools/" class="thumbnail"><img src="/wp-content/uploads/2016/06/Landscapepng.png" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="/landscaping-and-pools/" class="thumbnail"><img src="/wp-content/uploads/2016/06/Pools.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->

                <!--div class="item">
                	<div class="row">
                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                	</div>
                </div><!--.item-->

                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                </div><!--.Carousel-->

		</div>
	</div>
</div><!--.container-->

<script>
jQuery(document).ready(function() {
    jQuery('#Carousel').carousel({
        interval: 5000
    })
});
</script>
<?php

}

add_shortcode( 'ourassociateifm', 'ourassociates_ifm' );

function ourassociates_ifm(){
?>



<div class="container ifmcarousel  ifmassoc">
    <div class="row">
		<div class="col-md-12">
                <div id="Carousel_assoc" class="carousel slide">

                <!--ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol--->

                <!-- Carousel items -->
                <div class="carousel-inner">
                  <div class="item active">
                 <div class="row">
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/11/ifm_clientlogo.png" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/almoayyednew.png" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/11/AC-Logo.jpg" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/11/ACC-Logo.jpg" alt="Image" style="max-width:100%;"></a></div>
                 </div><!--.row-->
                </div><!--.item-->
                <div class="item">
                 <div class="row">
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/1.png" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/2.png" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/3.png" alt="Image" style="max-width:100%;"></a></div>
                   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/4.png" alt="Image" style="max-width:100%;"></a></div>
                 </div><!--.row-->
                </div><!--.item-->

                <div class="item">
                 <div class="row">
                  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/5.png" alt="Image" style="max-width:100%;"></a></div>
                  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/6.png" alt="Image" style="max-width:100%;"></a></div>
                  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/7.png" alt="Image" style="max-width:100%;"></a></div>
                  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/8.png" alt="Image" style="max-width:100%;"></a></div>
                 </div><!--.row-->
                </div><!--.item-->

                <div class="item">
                 <div class="row">
                  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/9.png" alt="Image" style="max-width:100%;"></a></div>
                <!--  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/10.png" alt="Image" style="max-width:100%;"></a></div>
-->
                 </div><!--.row-->
                </div><!--.item-->

                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel_assoc" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carousel_assoc" class="right carousel-control">›</a>
                </div><!--.Carousel-->

		</div>
	</div>
</div><!--.container-->

<script>
jQuery(document).ready(function() {
    jQuery('#Carousel_assoc').carousel({
        interval: 5000
    })
});
</script>


<?php
}

add_shortcode( 'ourclientifm', 'ourclient_ifm' );

function ourclient_ifm(){
?>



<div class="container ifmcarousel  ifmclient">
    <div class="row">
		<div class="col-md-12">
                <div id="Carousel_client" class="carousel slide">

                <!--ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                </ol--->

                <!-- Carousel items -->
                <div class="carousel-inner">

                <div class="item active">
                	<div class="row">
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/31.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/moflogo.png" alt="Image" style="max-width:100%;"></a></div>
                	   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/42.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/huawei.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->
                <div class="item">
                	<div class="row">
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/shifa-hospital.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/4seasons.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/RAMADAPALACE.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/IBN.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->
                 <div class="item">
                	<div class="row">
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/the-gulf-hotel-bahrain.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/4seasons.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/RAMADAPALACE.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/IBN.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->
                <div class="item">
                	<div class="row">

                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/the-gulf-hotel-bahrain.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/art-rotana.png" alt="Image" style="max-width:100%;"></a></div>
                          <!-- <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/algosai.png"" alt="Image" style="max-width:100%;"></a></div>-->
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/111.png" alt="Image" style="max-width:100%;"></a></div>
                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/211.png" alt="Image" style="max-width:100%;"></a></div>
                	</div><!--.row-->
                </div><!--.item-->
                <div class="item">
                	<div class="row">

                		<div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/211.png" alt="Image" style="max-width:100%;"></a></div>
                		<!--<div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/31.png" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/12/moflogo.png" alt="Image" style="max-width:100%;"></a></div>
                	   <div class="col-md-3"><a href="#" class="thumbnail"><img src="/wp-content/uploads/2016/06/42.png" alt="Image" style="max-width:100%;"></a></div>-->
                	</div><!--.row-->
                </div><!--.item-->

                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel_client" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carousel_client" class="right carousel-control">›</a>
                </div><!--.Carousel-->

		</div>
	</div>
</div><!--.container-->

<script>
jQuery(document).ready(function() {
    jQuery('#Carousel_client').carousel({
        interval: 9000
    })
});
</script>


<?php
}

?>