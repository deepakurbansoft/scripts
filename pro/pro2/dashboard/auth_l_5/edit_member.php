<?php
require 'db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
?><!doctype html>


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
								<h3><i class="icon-th-list"></i> Edit Member Details </h3>
							</div>
							<div class="box-content nopadding">
								<form action="edit_mem_submit.php" method="POST" class='form-horizontal form-bordered' enctype="multipart/form-data">
<?php
    
    $query  = "select * from user_data WHERE newid='$memid'";
    //echo $query;
    $result = mysqli_query($con, $query);
    $sno    = 1;
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $pic_src = $row['pic_add'];
            $name    = $row['name'];
            $email   = $row['email'];
            $age     = $row['age'];
            $date    = $row['joining'];
            $address = $row['address'];
            $contact = $row['contact'];
            $height  = $row['height'];
            $weight  = $row['weight'];
            $proof  = $row['proof'];
            $proof_photo  = $row['proof_photo'];
            $gender  = $row['sex'];
            $emg_name  = $row['emg_name'];
            $emg_no  = $row['emg_no'];
        }
    }
?>
<div class="control-group">
										<label for="textfield" class="control-label">Membership ID :</label>
										<div class="controls">
			
										<input type="text" name="p_id" value="<?php  echo $memid; ?>" class="uneditable-input"  readonly/>
										</div>
									</div>



									<div class="control-group">
										<label for="textfield" class="control-label">Photo :</label>

										<div class="controls">

											<img src='<?php echo $pic_src; ?>' width="150" style="border: 1px solid #ccc"><br><br>

<!--											<a href="javascript:;" class="btn btn-primary" onclick="return del_photo()">Remove</a>-->

											Upload New Photo : <input type="file" name="photo" id="photo" value="Browse">

										</div>

									</div>
						

<div class="control-group">
										<label for="textfield" class="control-label">Name :</label>
										<div class="controls"><span id="sprytextfield1">
										  <input type="text" name="p_name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" value ='<?php
    echo $name;
?>' placeholder="Member Name" maxlength="30">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


<div class="control-group">
										<label for="emailfield" class="control-label">E-Mail :</label>
										<div class="controls">
											
										  <input type="text" name="email"  id="emailfield" class="input-xlarge" value ='<?php
    echo $email;
?>'  data-rule-minlength="5" placeholder="E-Mail" maxlength="60">
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Proof Given :</label>
										<div class="controls"><span id="">


												  <select name="proof" id="bbb" data-rule-required="true" class="country1">
													  <option value="">-- Please select --</option>
													  <option value="Driving License" <?php if($proof=='Driving License'){?> selected <?php } ?> >Driving License</option>
													  <option value="Passport" <?php if($proof=='Passport'){?> selected <?php } ?> >Passport</option>
													  <option value="Cpr" <?php if($proof=='Cpr'){?> selected <?php } ?> >CPR</option>
												  </select>



									    <span class="selectRequiredMsg">Please select an item.</span></span></div><div class="city1">

										</div>
									</div>

									<div class="control-group">

										<?php
										if($proof_photo!=''){?>
										<label for="textfield" class="control-label">Uploaded Proof :</label>
										<?php }?>
										<div class="controls">
											<?php
											if($proof_photo!=''){?>
											<img src='<?php echo $proof_photo; ?>' width="150" style="border: 1px solid #ccc;"><br><br>
											<?php }?>
											<!--											<a href="javascript:;" class="btn btn-primary" onclick="return del_photo()">Remove</a>-->

											Upload New Proof : <input id="proof" name="proof" type="file" multiple=false>

										</div>

									</div>




<div class="control-group">
										<label for="textfield" class="control-label">Age :</label>
										<div class="controls"><span id="sprytextfield2">
										  <input type="text" name="age" id="textfield4" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" placeholder="Age" value ='<?php
    echo $age;
?>'  onKeyPress="return checkIt(event)" maxlength="3">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Gender :</label>
										<div class="controls"><span id="spryselect_gender">
										  <select name="sex" id="bbb" data-rule-required="true">
											  <option value="">-- Please select --</option>
											  <option value="Male" <?php if($gender=='Male'){?> selected <?php } ?>>Male</option>
											  <option value="Female" <?php if($gender=='Female'){?> selected <?php } ?>>Female</option>
										  </select>
									    <span class="selectRequiredMsg">Please select an item.</span></span></div>
									</div>

<!---->
<!-- <div class="control-group">-->
<!--										<label for="textfield" class="control-label">Date :</label>-->
<!--										<div class="controls"><span id="sprytextfield3">-->
<!--										  <input type="text" name="date" id="textfield22" class="input-medium datepick" value ='--><?php
//    echo $date;
//?><!--' >-->
<!--									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>-->
<!--									</div>-->
 

 <div class="control-group">
										<label for="textfield" class="control-label">Address :</label>
										<div class="controls">
										 <input type="text" name="add" id="textfield5" class="input-xlarge" data-rule-required="true" data-rule-minlength="6" value ='<?php
    echo $address;
?>'  placeholder="Address">
										</div>
									</div>


    <div class="control-group">
										<label for="textfield" class="control-label">Contact :</label>
										<div class="controls"><span id="sprytextfield4">
										  <input type="text" name="contact" id="textfield6" class="input-xlarge" data-rule-required="true" data-rule-minlength="10" placeholder="Mobile / Phone" value ='<?php
    echo $contact;
?>'  onKeyPress="return checkIt(event)" maxlength="10">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Emergency Contact Person :</label>
										<div class="controls"><span id="sprytextfield1">
										<input type="text" name="emg_name" id="" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" placeholder="Person Name" maxlength="30" value="<?php echo $emg_name;?>">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


									<div class="control-group">
										<label for="textfield" class="control-label">Emergency Contact Number :</label>
										<div class="controls"><span id="sprytextfield4">
										  <input type="text" name="emg_no" id="" class="input-xlarge" data-rule-required="true" data-rule-minlength="10" placeholder="Mobile / Phone" value="<?php echo $emg_no;?>" onKeyPress="return checkIt(event)" maxlength="10">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

                                    
    <div class="control-group">
										<label for="textfield" class="control-label">Height :</label>
										<div class="controls">
										 <input type="text" name="height" id="textfield" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="Height" onKeyPress="return checkIt(event)" value ='<?php
    echo $height;
?>' maxlength="3"> (In Feet)
										</div>
									</div>


					<div class="control-group">
										<label for="textfield" class="control-label">Weight :</label>
										<div class="controls">
										 <input type="text" name="weight" id="textfield" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="Weight" onKeyPress="return checkIt(event)" value ='<?php
    echo $weight;
?>'  maxlength="3"> (In Kgs)
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

function del_photo(mem_id)
{
	if (confirm("Delete photo?")){



		$.ajax({ //Process the form using $.ajax()
			type      : 'POST', //Method type
			url       : 'del_photo.php', //Your form processing file URL
			data: {mem_id:mem_id},
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


	}

	else{

	}

}
    </script>
</body>

	</html>
<?php
} else {
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
}
?>

