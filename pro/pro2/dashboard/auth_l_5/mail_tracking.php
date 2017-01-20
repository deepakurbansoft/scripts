<?php
require 'db_conn.php';
page_protect();
?>

<!doctype html>
<head>
	<title>Gym Management - ELITE HOSPITALITY GROUP</title>
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
	<link rel="stylesheet" href="../../css/themes.css">
	<link rel="stylesheet" href="../../css/bootstrap-toggle.css">

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


	<script src="../../js/bootstrap-toggle.js"></script>


	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<script type="text/javascript">
		function ConfirmDelete()
		{
			if (confirm("Delete Plan?"))
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
						<a href="#">Tracking Mails</a>

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

					<br>

					<div class="box box-color box-bordered">

						<input type='button' class='btn btn-primary'  value='Settings' data-toggle='modal' data-id='' data-target='#settingsModal'/>

					</div>

					<div class="box box-color box-bordered">
						<div class="box-title">
							<h3>
								<i class="icon-inbox"></i>
								Sent Mail Details
							</h3>
						</div>



						<div class="box-content nopadding">
							<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
								<thead>
								<tr>
									<th>S.No</th>
									<th>Membership ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Plan Name</th>
									<th>Expiry Date</th>
									<th>Status</th>
									<th>Mail Sent</th>
								</tr>
								</thead>
								<tbody>
								<?php


								$query  = "select * from mail_tracking where 1";
								//echo $query;
								$result = mysqli_query($con, $query);
								$sno    = 1;

								if (mysqli_affected_rows($con) != 0) {
									while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										$msgid = $row['mem_id'];
										if($row['status']==1){
											$status = 'Sent';
										}else{
											$status = 'Failed';
										}
											?>
										<tr>
											<td> <?php echo $sno;?> </td>
											<td> <?php echo $row['mem_id'];?> </td>
											<td> <?php echo $row['name'];?> </td>
											<td> <?php echo $row['email'];?> </td>
											<td> <?php echo $row['plan'];?> </td>
											<td> <?php echo $row['expiry_date'];?> </td>
											<td> <input type='button' class='btn btn-success' value='<?php echo $status;?>'> </td>
											<td> <?php echo $row['time_stamp'];?> </td>
								        </tr>
										<?php

										$sno++;

										$msgid = 0;
									}

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

<?php include 'common_files/footer.php';?>

<div id="settingsModal" class="modal fade" style="display: none;" role="dialog">

	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #368EE0; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Settings - Mail</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" role="form" id="refund_form" name="refund_form">
					<input type="hidden" name="Id" id="Id">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Send Mail in 5 Days : &nbsp;</label>
						<div class="col-sm-10">

							<input type="checkbox" id="5"  data-toggle="toggle" data-size="mini" checked>
							<div id="console-event"></div>

							<div class="check-change js-check-change-field"></div>

						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Send Mail in 15 Days : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold; font-size: 16px; color: green;" id="amount_area">

							<input type="checkbox" id="15"  data-toggle="toggle" data-size="mini" checked>
							<div id="console-event"></div>

						</div>
					</div>
					<br>


					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Send Mail in 30 Days : &nbsp;</label>
						<div class="col-sm-10" style="padding: 5px; font-weight: bold; font-size: 16px; color: green;" id="amount_area">

							<input type="checkbox" id="30"  data-toggle="toggle" data-size="mini" checked>
							<div id="console-event"></div>

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

<script type="text/javascript">



	$(function() {
		$('#5').change(function() {

			$.ajax
			({
				type: "POST",
				url: "ajax_subamount.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					var total_amount = parseInt(html) + parseInt(total);

					$(".total").val(total_amount);
					$(".amount").val(total_amount);

					$(".discount").val(0);
					$(".paid_amount").val('');

				}
			});



		})
	})

	$(function() {
		$('#15').change(function() {

//			alert( $(this).prop('checked'));
		})
	})

	$(function() {
		$('#30').change(function() {

//			alert( $(this).prop('checked'));
		})
	})




	$('input[type="checkbox"]').change(function(event) {

		var id=$(this).val();
		var total= $(".amount").val();
		var dataString = 'id='+ id;

//		alert(id);

		if (this.checked) {

			$.ajax
			({
				type: "POST",
				url: "ajax_subamount.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					var total_amount = parseInt(html) + parseInt(total);

					$(".total").val(total_amount);
					$(".amount").val(total_amount);

					$(".discount").val(0);
					$(".paid_amount").val('');

				}
			});


		}
		else {
			$.ajax
			({
				type: "POST",
				url: "ajax_subamount.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					var total_amount = parseInt(total) - parseInt(html);

					$(".total").val(total_amount);
					$(".amount").val(total_amount);

					$(".discount").val(0);
					$(".paid_amount").val('');
				}
			});
		}
	});


</script>

</body>

</html>



