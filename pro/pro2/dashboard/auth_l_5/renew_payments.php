<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['name'])) {
    $memid  = $_POST['name'];
    $query1 = "select * from user_data WHERE newid='$memid'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name = $row1['name'];
            $pic  = $row1['pic_add'];
            $expiry_date = $row1['expiry'];
        }
    }
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
	<!-- PageGuide -->
	<link rel="stylesheet" href="../../css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../../css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="../../css/themes.css">
	<!-- Tagsinput -->
	<link rel="stylesheet" href="../../css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="../../css/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="../../css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="../../css/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="../../css/plugins/plupload/jquery.plupload.queue.css">


	<!-- jQuery -->
	<script src="../../js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="../../js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Masked inputs -->
	<script src="../../js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- TagsInput -->
	<script src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="../../js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="../../js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- Chosen -->
	<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- MultiSelect -->
	<script src="../../js/plugins/multiselect/jquery.multi-select.js"></script>
	<!-- CKEditor -->
	<script src="../../js/plugins/ckeditor/ckeditor.js"></script>
	<!-- PLUpload -->
	<script src="../../js/plugins/plupload/plupload.full.js"></script>
	<script src="../../js/plugins/plupload/jquery.plupload.queue.js"></script>
	<!-- Custom file upload -->
	<script src="../../js/plugins/fileupload/bootstrap-fileupload.min.js"></script>

	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

	$(document).ready(function()
	{


			$(".country").change(function()
			{

				$('#subplan_div').slideDown(500);
				$('input[type="checkbox"]').prop('checked', false);

				var id=$(this).val();
				var dataString = 'id='+ id;

				$.ajax
				({
					type: "POST",
					url: "ajax_renew.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
					$(".city").html(html);
					}
				});

			});

	$('input[type="checkbox"]').change(function(event) {

		var id=$(this).val();
		var total= $(".amount").val();
		var dataString = 'id='+ id;

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
					$(".paid_amount").val(total_amount);

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
					$(".paid_amount").val(total_amount);
				}
			});
		}
	});

	});

</script>



    <SCRIPT LANGUAGE="JavaScript">
function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
}
</SCRIPT>


<script type="text/javascript" src="webcam.js"></script>
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
							<a href="#">Renew Payments</a>

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
						<div class="box box-bordered box-color">

							<div class="box-title">
								<h3><i class="icon-th-list"></i> Renew Payments </h3>
							</div>

							<div class="box-content nopadding">

								<form action="submit_payments_renew.php" method="POST" class='form-horizontal form-bordered'>



									<div class="control-group">
										<label for="textfield" class="control-label">Membership ID :</label>
										<div class="controls">
											<input type="text" name="p_id" value="<?php	echo $memid;?>" class="uneditable-input"  readonly/>
										</div>
									</div>


									<div class="control-group">
										<label for="textfield" class="control-label">Name :</label>
										<div class="controls"><span id="sprytextfield1">
										  <input type="text" name="p_name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" value="<?php echo $name; ?>" placeholder="Member Name" maxlength="30" readonly/>
										<span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


									<div class="control-group">
										<label for="emailfield" class="control-label">Photo :</label>
										<div class="controls">
										<img src='<?php echo $pic;?>' width="150" >
										</div>
									</div>


                                   <div class="control-group">
										<label for="textfield" class="control-label">Date :</label>
										<div class="controls"><span id="sprytextfield3">
										  <input type="text" name="date" id="textfield22" class="input-medium datepick" value="<?php
									echo date('Y-m-d');
									?>">
										<span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>



									<div class="control-group">
										<label for="textfield" class="control-label">Membership Type :</label>

										<div class="controls"><span id="spryselect2">
												<select name="mem_type" id="id" data-rule-required="true" class="country">
												<option value="">-- Please select --</option>
												<?php

												$query = "select * from mem_types";

												//echo $query;
												$result = mysqli_query($con, $query);

												if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												echo "<option value=" . $row['mem_type_id'] . ">" . $row['name'] . "</option>";

												}
												}

												?>
												</select>
									    <span class="selectRequiredMsg">Please select an item.</span></span>
									    </div>


									</div>

									<div class="control-group hide" id="subplan_div">
										<label for="textfield" class="control-label">Sub Plan :</label>
										<div class="controls"><span id="spryselect2">

												<?php

												$query = "select * from mem_types_sub";

												//echo $query;
												$result = mysqli_query($con, $query);

												if (mysqli_affected_rows($con) != 0) {
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

														?>
														<input type='checkbox' name='sub_plan[]' id="sub_plan" value="<?php echo $row['mem_type_id']; ?>"> <?php echo $row['name'];?> &nbsp;&nbsp;
														<?php

//														echo "<input type='checkbox' name='sub_plan' value=" . $row['mem_type_id'] . "> ". $row['name'] ."  ";

													}
												}

												?>






									    <span class="selectRequiredMsg">Please select an item.</span></span></div>

											<div class="city">

											</div>

									</div>


									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Save changes</button>
										
									</div>

								</form>
							</div>
					</div>
						</div>
			
							</div>
						</div>
					</div>
				</div>

<?php include 'common_files/footer.php';?>
		
	
		
    <script type="text/javascript">
		var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
		var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
		var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
		var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
		var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
		var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
    </script>

</body>

	</html>

<?php
} else {
    
}
?>