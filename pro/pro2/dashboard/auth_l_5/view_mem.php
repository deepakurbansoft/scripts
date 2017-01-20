<?php
require 'db_conn.php';
page_protect();
?>

<!doctype html>


<head><title>Gym Management - ELITE HOSPITALITY GROUP</title>
		<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- dataTables -->
	<link rel="stylesheet" href="../../css/plugins/datatable/TableTools.css">
	<!-- chosen -->
	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../../css/style.css">
	<!-- Color CSS -->
<!--	<link rel="stylesheet" href="../../css/themes.css">-->

	<!-- Datepicker -->
	<link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">

	<!-- jQuery -->
	<script src="../../js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<!-- slimScroll -->
	<script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="../../js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- dataTables -->
	<script src="../../js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="../../js/plugins/datatable/TableTools.min.js"></script>
	<script src="../../js/plugins/datatable/ColReorder.min.js"></script>
	<script src="../../js/plugins/datatable/ColVis.min.js"></script>
	<!-- Chosen -->
	<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>

	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>

	<!-- Datepicker -->
	<script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Delete Member?"))
                 return true;
else
return false;
      }
  </script>
</head>

<body>


<?php include 'common_files/nav_top.php';?>


	
<div class="container-fluid" id="content">

  <div id="main">

	  <div class="container-fluid">
	  <?php include 'common_files/header_dashboard.php'; ?>


				<div class="breadcrumbs">
					<ul>

						<li>
							<a href="index.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>

						<li>
							<a href="#">Members</a>
							<i class="icon-angle-right"></i>
						</li>

						<li>
							<a href="#">View Members</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">

							<div class="box-title">
								<h3>
									<i class="icon-inbox"></i>
									Members List
								</h3>
							</div>


							<div style="padding: 10px; border-bottom: 0 none" class="box-content">

								<form action="" method="POST">

<!--								<div class="pull-left">-->
<!---->
<!--									<button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Members - All Location</button>-->
<!---->
<!--								</div>-->

								<div style="" class="pull-right">

									<span style="padding-bottom: 2px;">Plan : </span>

									<select style="margin-right: 10px;" name="plan">
										<option value="">Select Plan</option>
										<?php


										$query  = "select * from mem_types WHERE 1";
										//echo $query;
										$result = mysqli_query($con, $query);

										if (mysqli_affected_rows($con) != 0) {

											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												?>

												<option value="<?php echo $row['mem_type_id'] ?>"><?php echo $row['name'] ?></option>

												<?php

													}
												}



										?>

									</select>

									<span style="padding-bottom: 2px;">Location : </span>

									<select style="margin-right: 10px;" name="location">
										<option value="">Select Location</option>
										<option value="all">All</option>

										<?php


										$query  = "select * from gym_location WHERE 1";
										//echo $query;
										$result = mysqli_query($con, $query);

										if (mysqli_affected_rows($con) != 0) {

											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												?>

												<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

												<?php

											}
										}



										?>

									</select>

									<button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Search</button>
								</form>

							</div>

							</div>

							<div class="box-content nopadding">

								<table class="table table-nomargin dataTable dataTable-tools no_sort  table-bordered">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Joing</th>
											<th>Name / Member ID</th>
											<th>Membership Expiry</th>
											<th>Address / Contact</th>

											<th>E-Mail / Age / Sex</th>
											<th>Location</th>
											<th>Member Type</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php



$query  = "select * from user_data where wait='no' ";

if($_SESSION['auth_type']!= 1) {
	if (!$_POST['location']) {

		$gym_location = $_SESSION['gym_location'];
		$query .= " and `gym_location` =  '$gym_location'";

	}
}

if($_POST['location']){

	if($_POST['location'] != 'all'){
	$location = $_POST['location'];
	$query.=" and `gym_location` =  '$location'";
}
else {
	$query = "select * from user_data where wait='no'";
}
}


if($_POST['plan']){
	$plan = $_POST['plan'];
	$query.=" and `sub_type` =  '$plan'";
}

$query.=" ORDER BY `joining` DESC ";
//echo $query;

$result = mysqli_query($con, $query);
$sno    = 1;

if (mysqli_affected_rows($con) != 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $msgid   = $row['newid'];
        $query1  = "select * from subsciption WHERE mem_id='$msgid' AND renewal='yes'";
        $result1 = mysqli_query($con, $query1);

        if (mysqli_affected_rows($con) == 1) {
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {


//                echo "<tr><td>" .$row1['sub_type_name']." - ". $row1['expiry'] . " / </td>";
					 echo "<tr><td>" . $sno . "</td>";
					 echo "<td>" . $row['joining']. "</td>";
					 echo "<td>" . $row['name'] . " / " . $row['newid'] . "<br><img width='100' src='" . $row['pic_add'] . "'></td>";
				?>

				<td><?php echo $row1['sub_type_name']." - " . $row1['expiry']."<br><br>";
					$query2  = "select * from subsciption_sub WHERE mem_id='$msgid' AND renewal='yes'";

					$result2 = mysqli_query($con, $query2);
					if (mysqli_affected_rows($con) != 0) {
						while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

							$plan_id = $row2['plan_id'];
							$sub_expire = $row2['expire_date'];

							$query3  = "select * from mem_types_sub WHERE mem_type_id='$plan_id'";
							$result3 = mysqli_query($con, $query3);
							if (mysqli_affected_rows($con) != 0) {
								while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {



									echo $row3['name']." - ".$sub_expire."<br><br>";

								}
							}

						}
					}

					?>
				</td>

				<?php
                $expiry        = $row1['expiry'];
                $sub_type_name = $row1['sub_type_name'];


                echo "<td>" . $row['address'] . " / " . $row['contact'] . "</td>";
//                echo "<td>" . $row['proof'] . " / " . $row['other_proof'] . "</td>";
                echo "<td>" . $row['email'] . " / " . $row['age'] . " / " . $row['sex'] . "</td>";
?>
					<td><?php echo get_field('gym_location',$row['gym_location'],'id','name');?></td>
                <?php
//                echo "<td>" . $row['height'] . " / " . $row['weight'] . "</td>";

//                echo "<td>" . $row['joining'] . " / " . $row1['sub_type_name'] . "</td>";


?>
				<td><?php echo  $row1['sub_type_name']."<br><br>";
				$query2  = "select * from subsciption_sub WHERE mem_id='$msgid' AND renewal='yes'";

				$result2 = mysqli_query($con, $query2);
				if (mysqli_affected_rows($con) != 0) {
					while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

						$plan_id = $row2['plan_id'];

							$query3  = "select * from mem_types_sub WHERE mem_type_id='$plan_id'";
							$result3 = mysqli_query($con, $query3);
							if (mysqli_affected_rows($con) != 0) {
								while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {



									echo $row3['name'].", ";

								}
							}

						}
					}

					$sno++;

?>
					</td>


				<td>
				<form action='read_member.php' method='post'>
				<input type='hidden' name='name' value='<?php echo $msgid ?>'/>
				<input type='submit' value='View / Invoice ' class='btn btn-info'/>
				</form>


				<form action='edit_member.php' method='post'>
				<input type='hidden' name='name' value='<?php echo $msgid ?>'/>
				<input type='submit' value='Edit' class='btn btn-warning'/>
				</form>



				<?php

				if(($_SESSION['gym_location'] == $row['gym_location'] && $_SESSION['auth_type']== 2) || $_SESSION['auth_type']== 1) {?>


				<form action='del_member.php' method='post' onSubmit='return ConfirmDelete();'>
				<input type='hidden' name='name' value='<?php echo $msgid ?>'/>
				<input type='submit' value='Delete ' class='btn btn-danger'/>
				</form>
				<?php }?>

				<form action='renew_payments.php' method='post'>
				<input type='hidden' name='name' value='<?php echo $row1['mem_id'] ?>'/>
				<input type='submit' value='Renew' class='btn btn-info'/>
				</form>

				<?php if($_SESSION['auth_type']== 1 ){?>
				<form>
				<input type='button' class='btn btn-warning open-cancelmodal cancel_button<?php echo $row['newid']?>' value='Refund / Cancel' data-toggle='modal' data-id='<?php echo $row['newid']?>' data-target='#cancelModal' />
				</form>
				<form>
				<input type='button' class='btn btn-warning open-freezemodal freeze_button freeze_user<?php echo $row['newid']?>'  value='Freeze' data-toggle='modal' data-id='<?php echo $row['newid']?>' data-target='#freezeModal'/></form>


									<?php

									}

				  ?>
					</td></tr>
					<?php

                $msgid = 0;

            }


        }


    }
   $sno ++;
}

?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>
				
				
				</div>	</div>
				</div>



<div id="cancelModal" class="modal fade" style="display: none;" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #368EE0; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cancel User</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" role="form" id="refund_form" name="refund_form">
					<input type="hidden" name="Id" id="Id">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Date of Cancel : &nbsp;</label>
						<div class="col-sm-10">
							<input type="text" name="date" class="input-medium datepick" value="<?php echo date('Y-m-d'); ?>" readonly>
<!--							<input type="text" name="date" id="textfield22" class="input-medium datepick" value="--><?php //echo date('Y-m-d'); ?><!--">-->
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Refund Amount : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold; font-size: 16px; color: green;" id="amount_area">

							<span id="refund_span"></span><span> BHD</span>
						</div>
					</div>
					<br>


					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Paid Amount : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold; font-size: 16px; color: green;" id="amount_area">
							<input type="text" class="form-control" id="refund_textbox" name="refund_amount" required>

						</div>
					</div>

					<br>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Reason for Cancel : &nbsp;</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="reason" id="reason" placeholder="Reason for cancel"></textarea>
						</div>
					</div>


			</div>
			<div class="modal-footer">
				<input type="submit" value="Submit" class="btn btn-primary">
<!--				<button type="submit" class="btn btn-primary" >Submit</button>-->
			</div>

			</form>
		</div>

	</div>
</div>

<div id="freezeModal" class="modal fade" style="display: none;" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #368EE0; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Freeze User</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" role="form" id="freeze_form" name="freeze_form">
					<input type="hidden" name="user_id" id="user_id">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Plan : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold;">
							<span class="plan"> </span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Total Days : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold;">
							<span class="total_days"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Served Days : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold;">
							<span class="served_days"></span>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Balance Days : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold;">
							<input type="hidden" name="balance_days" id="balance_days">
							<span class="balance_days"></span>
						</div>
					</div>




			</div>
			<div class="modal-footer">
				<input type="submit" value="Freeze" class="btn btn-primary">
<!--				<button type="submit" class="btn btn-primary" >Submit</button>-->
			</div>

			</form>
		</div>

	</div>
</div>

<?php include 'common_files/footer.php';?>

<script type="application/javascript">

	$(document).on("click", ".open-cancelmodal", function () {

		var Id = $(this).data('id');


		$(".modal-body #Id").val( Id );


		$.ajax({ //Process the form using $.ajax()
			type      : 'POST', //Method type
			url       : 'refund_process.php', //Your form processing file URL
			data: {Id:Id},
			dataType  : 'json',
			success   : function(data) {

				if (data.success) { //If fails

					$('#refund_textbox').val(data.refund_amount);
					$('#refund_span').html(data.refund_amount);


					if(data.refund_amount<0){

						$('#amount_area').css('color','red');
					}

				}
				else {

//                        window.location='profile.php';
				}
			}
		});




	});

	$(document).on("click", ".open-freezemodal", function () {


		var Id = $(this).data('id');

		$(".modal-body #user_id").val( Id );


		$.ajax({ //Process the form using $.ajax()
			type      : 'POST', //Method type
			url       : 'freeze_process.php', //Your form processing file URL
			data: {Id:Id},
			dataType  : 'json',
			success   : function(data) {

				if (data.success) { //If fails

					$('.plan').html(data.plan);
					$('.total_days').html(data.total_days);
					$('.served_days').html(data.served_days);
					$('.balance_days').html(data.balance_days);
					$('#balance_days').val(data.balance_days);


					if(data.refund_amount<0){

						$('#amount_area').css('color','red');
					}

				}
				else {

//                        window.location='profile.php';
				}
			}
		});




	});

	$(document).ready(function(){

		$('#refund_form').submit(function(event) { //Trigger on form submit


			$.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : 'refund_submit.php', //Your form processing file URL
				data      : $('#refund_form').serialize(), //Forms name
				dataType  : 'json',
				success   : function(data) {
					if (data.success) { //If fails
						$('#cancelModal').modal('hide');
						$('.cancel_button'+data.user_id).val("Canceled");
						window.location='canceled_users.php';
					}
					else {


					}
				}
			});


			event.preventDefault(); //Prevent the default submit
		});

		$('#freeze_form').submit(function(event) { //Trigger on form submit


			$.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : 'freeze_submit.php', //Your form processing file URL
				data      : $('#freeze_form').serialize(), //Forms name
				dataType  : 'json',
				success   : function(data) {
					if (data.success) { //If fails
						$('#freezeModal').modal('hide');
						$('.freeze_user'+data.user_id).val("Freezed");

//						alert(data.user_id);
					}
					else {


					}
				}
			});


			event.preventDefault(); //Prevent the default submit
		});

	})



</script>
	</body>

	</html>



