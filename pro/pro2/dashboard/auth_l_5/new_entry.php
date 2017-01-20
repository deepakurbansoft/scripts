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
<!--	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
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

	<!-- imageupload -->
	<link rel="stylesheet" href="../../css/plugins/fileupload_bootstrap/fileinput.min.css">


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

	<!-- imageupload -->
	<script src="../../js/plugins/fileupload_bootstrap/fileinput.js"></script>

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

		$('input[type="checkbox"]').prop('checked', false);

		$('#subplan_div').slideDown(500);

		var id=$(this).val();

		var dataString = 'id='+ id;

		$.ajax
		({
		type: "POST",
		url: "ajax_city.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
		$(".city").html(html);
		}
		});

		});

		$(".mop").change(function()
		{

		var id=$(this).val();

		if(id=='card'){
			$('#cardno_div').slideDown();
		}else {
			$('#cardno_div').slideUp();
		}

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

<script type="text/javascript">
$(document).ready(function()
{
	$(".country1").change(function()
	{


	var id=$(this).val();

	var dataString = 'id='+ id;



	$.ajax
	({
	type: "POST",
	url: "ajax_city1.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$(".city1").html(html);
	}
	});

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




<!--<script type="text/javascript" src="webcam.js"></script>-->

	<style type="text/css">
		#kvFileinputModal{
			display: none;
		}
		.file-actions{
			display: none !important;
		}

		.city{
			border-top:1px solid #ccc;
			background: #ffffff;
			padding: 20px;
		}
	</style>
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
							<a href="#">New Member</a>
							
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
								<h3><i class="icon-th-list"></i> New Member Registration </h3>
							</div>
							<div class="box-content nopadding">
								<form action="new_submit.php" method="POST" class='form-horizontal form-bordered' enctype="multipart/form-data">


<!--								<div class="control-group">-->
<!--										<label for="textfield" class="control-label">Membership ID :</label>-->
<!--										<div class="controls">-->
<!--											<input type="text" name="p_id" value="--><?php //echo time();?><!--" class="uneditable-input"  readonly/>-->
<!---->
<!---->
<!--										</div>-->
<!--								</div>-->




						

									<div class="control-group">
										<label for="textfield" class="control-label">Name :</label>
										<div class="controls"><span id="sprytextfield1">
										<input type="text" name="p_name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" placeholder="Member Name" maxlength="30">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


									<div class="control-group">
										<label for="emailfield" class="control-label">E-Mail :</label>
										<div class="controls"><span id="sprytextfield5">
										<input type="text" name="email"  id="emailfield" class="input-xlarge" data-rule-minlength="5" placeholder="E-Mail" maxlength="60">
										<span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Photo :</label>

										<div class="controls">

											<input id="file-3" type="file" multiple=false>

										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Proof Given :</label>
										<div class="controls"><span id="">


												  <select name="proof" id="bbb" data-rule-required="true" class="country1">
													  <option value="">-- Please select --</option>
													  <option value="Driving License">Driving License</option>
													  <option value="Passport">Passport</option>
													  <option value="Cpr">CPR</option>
												  </select>



									    <span class="selectRequiredMsg">Please select an item.</span></span></div><div class="city1">
							
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Upload Proof :</label>

										<div class="controls">

<!--											<input id="file-4" type="file" multiple=false>-->
											<input id="proof" name="proof" type="file" multiple=false>

										</div>
									</div>



									<div class="control-group">
										<label for="textfield" class="control-label">Age :</label>
										<div class="controls"><span id="sprytextfield2">
										<input type="text" name="age" id="textfield4" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" placeholder="Age" onKeyPress="return checkIt(event)" maxlength="3">
										<span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


									<div class="control-group">
										<label for="textfield" class="control-label">Gender :</label>
										<div class="controls"><span id="spryselect_gender">
										  <select name="sex" id="bbb" data-rule-required="true">
										    <option value="">-- Please select --</option>
										    <option value="Male">Male</option>
										    <option value="Female">Female</option>
									    </select>
									    <span class="selectRequiredMsg">Please select an item.</span></span></div>
									</div>


 									<div class="control-group">
										<label for="textfield" class="control-label">Date :</label>
										<div class="controls"><span id="sprytextfield3">
<!--										  <input type="text" name="date" id="textfield22" class="input-medium datepick" value="--><?php //echo date('Y-m-d'); ?><!--" >-->
										  <input type="text" name="date" id="textfield22" class="input-medium datepick" >
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>
 

 									<div class="control-group">
										<label for="textfield" class="control-label">Address :</label>
										<div class="controls">
										 <input type="text" name="add" id="textfield5" class="input-xlarge" data-rule-required="true" data-rule-minlength="6" placeholder="Address">
										</div>
									</div>


   									<div class="control-group">
										<label for="textfield" class="control-label">Contact :</label>
										<div class="controls"><span id="sprytextfield4">
										  <input type="text" name="contact" id="textfield4" class="input-xlarge" data-rule-required="true" data-rule-minlength="10" placeholder="Mobile / Phone" onKeyPress="return checkIt(event)" maxlength="10">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

   									<div class="control-group">
										<label for="textfield" class="control-label">Nationality :</label>
										<div class="controls"><span id="sprytextfield6">
										  <input type="text" name="nationality" id="textfield6" class="input-xlarge" placeholder="Nationality">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Emergency Contact Person :</label>
										<div class="controls"><span id="sprytextfield1">
										<input type="text" name="emg_name" id="" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" placeholder="Person Name" maxlength="30">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


   									<div class="control-group">
										<label for="textfield" class="control-label">Emergency Contact Number :</label>
										<div class="controls"><span id="sprytextfield4">
										  <input type="text" name="emg_no" id="" class="input-xlarge" data-rule-required="true" data-rule-minlength="10" placeholder="Mobile / Phone" onKeyPress="return checkIt(event)" maxlength="10">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

                                    
   									<div class="control-group">
										<label for="textfield" class="control-label">Height :</label>
										<div class="controls">
										 <input type="text" name="height" id="textfield" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="Height"  maxlength="10"> (In  FEET)
										</div>
									</div>


									<div class="control-group">
										<label for="textfield" class="control-label">Weight :</label>
										<div class="controls">
										 <input type="text" name="weight" id="textfield" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="Weight"  maxlength="10"> (In Kgs)
										</div>
									</div>

									<?php

									if($_SESSION['auth_type']!=3){
									?>

									<div class="control-group">
										<label for="textfield" class="control-label">Location :</label>
										<div class="controls"><span id="spryselect1">
												  <select name="location" id="bbb" data-rule-required="true" class="">
													  <option value="">-- Please select --</option>

													  <?php

													  if($_SESSION['auth_type']==1){
														  $query  = "select * from gym_location WHERE 1";
													  }else{
														  $location = $_SESSION['gym_location'];
														  $query  = "select * from gym_location WHERE `id` = '$location'";
													  }


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

									    <span class="selectRequiredMsg">Please select an item.</span></span></div><div class="city1">

										</div>
									</div>

									<?php
									}
									else{

										?>
									<input type="hidden" name="location" id="location" value="<?php echo $_SESSION['gym_location']?>">
									<?php
									}
									?>

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
									    <span class="selectRequiredMsg">Please select an item.</span></span></div>

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

									<div class="control-group hide">
										<label for="textfield" class="control-label"> Membership Expiry :</label>
										<div class="controls"><span id="spryselect1">


									    <span class="selectRequiredMsg">Please select an item.</span></span></div><div class="city1">

										</div>
									</div>



									<div class="control-group hide" id="expiry_div">
										<label for="textfield" class="control-label">Expiry Date :</label>
										<div class="controls" style="padding-top: 15px;"><span id="expire_date">
												  <img src="../images/loading.gif" width="30" height="30" style="padding-left: 30px;">

									    </span></div>
									</div>


									<div class="control-group hide" id="show_expiry">
										<label for="textfield" class="control-label">Expiry :</label>
										<div class="controls">
											<input type="text" name="" id="expiry_date" value=""  readonly/>
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Payment Mode :</label>
										<div class="controls"><span id="spryselect1">
												  <select name="mop" id="bbb" data-rule-required="true" class="mop">

													  <option value="cash">Cash</option>
													  <option value="cheque">Cheque</option>
													  <option value="card">Credit Card</option>


												  </select>

									    <span class="selectRequiredMsg">Please select an item.</span></span></div><div class="city1">

										</div>
									</div>

									<div class="control-group hide" id="cardno_div">
										<label for="textfield" class="control-label">Card No (Last 4 Digit) :</label>
										<div class="controls"><span id="sprytextfield6">
												<input type="text" name="card_no" id="card_no" value="" data-rule-required="true" data-rule-minlength="4" placeholder="Card No"  maxlength="4"/>
									    <span class="selectRequiredMsg">Please select an item.</span></span></div>
									</div>


									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Add Member</button>
										
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
		var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
		var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
		var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield_paid");
		var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
		var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
//
		var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
		var spryselect1 = new Spry.Widget.ValidationSelect("spryselect_gender");
		var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");

    </script>

	<script type="application/javascript">

		$("#file-3").fileinput({
			showUpload: false,
			showCaption: false,
			browseClass: "btn btn-primary btn-lg",
			fileType: "any",
			previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"

		});

		$("#file-4").fileinput({
			showUpload: false,
			showCaption: false,
			browseClass: "btn btn-primary btn-lg",
			fileType: "any",
			previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
		});


		$(document).ready(function() {
			$("#test-upload").fileinput({
				'showPreview' : false,
				'allowedFileExtensions' : ['jpg', 'png','gif'],
				'elErrorContainer': '#errorBlock'
			});
			/*
			 $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
			 alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
			 });
			 */





		})

		$('#preview_modal').on('show.bs.modal', function (event) {

			var image = $('.file-preview-image'). attr('src');


			$('.photo').css('background-image', 'url(' + image + ')');


		})

		function getdate() {

			var count_day = $(".membership option:selected").val();

			$('#expiry_div').css('display','none');
			$('#expiry_div').slideDown(500);

			$.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : 'date.php', //Your form processing file URL
				data: {day_count:count_day},
				dataType  : 'json',
				success   : function(data) {
//					alert(data.result_date);
					if (data.success) { //If fails

						$('#expire_date').html(data.result_date);


					}
					else {

//                        window.location='profile.php';
					}
				}
			});

			$(document).ajaxStart(function(){
				$(".accept_btn").val("Loading...");
			});

			$(document).ajaxComplete(function(){
				$(".signin").val("Sign in");
			});



//			var n=30; //number of days to add.
//			var today=new Date(); //Today's Date
//			var requiredDate=new Date(today.getFullYear(),today.getMonth(),today.getDate()+n)
//
//
//			var convert_date = dateFormat(new Date(requiredDate), 'dd/mm/yyyy');
//
//			var  = new Date(requiredDate);



//			var count_day = $(".membership option:selected").val();
//
//			var tt = document.getElementById('current_date').value;
//
//			var date = new Date(tt);
//			var newdate = new Date(date);
//
//			newdate.setDate(newdate.getDate() + count_day);
//
//			var dd = newdate.getDate();
//			var mm = newdate.getMonth() + 1;
//			var y = newdate.getFullYear();
//
//			var someFormattedDate = mm + '/' + dd + '/' + y;

//			document.getElementById('follow_Date').value = someFormattedDate;
		}

		function calculate_discount(){

			var total = $("input[name=amount]").val();

			var discount = $("input[name=discount]").val();

			var discount_amount = (total/100)*discount;

			$(".total").val(total - discount_amount);

			$(".paid_amount").val(total - discount_amount);
		}
	</script>

</body>

</html>

