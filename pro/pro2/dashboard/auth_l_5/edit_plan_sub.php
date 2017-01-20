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
								<h3><i class="icon-th-list"></i> Edit Plan Details </h3>
							</div>
							<div class="box-content nopadding">
								<form action="submit_plan_edit_sub.php" method="POST" class='form-horizontal form-bordered'>
<?php
    
    $query  = "select * from mem_types_sub WHERE mem_type_id='$memid'";
    //echo $query;
    $result = mysqli_query($con, $query);
    $sno    = 1;
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name    = $row['name'];
            $days    = $row['days'];
            $rate    = $row['rate'];
            $details = $row['details'];
        }
    }
?>
<div class="control-group">
										<label for="textfield" class="control-label">Plan ID :</label>
										<div class="controls">
			
							<input type="text" name="p_id" value="<?php
    echo $memid;
?>" class="uneditable-input"  readonly/>
										</div>
									</div>



<div class="control-group">
										<label for="textfield" class="control-label">Name :</label>
										<div class="controls"><span id="sprytextfield1">
										  <input type="text" name="name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" value ='<?php
    echo $name;
?>' placeholder="Plan Name" maxlength="100">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


<div class="control-group">
										<label for="emailfield" class="control-label">Details :</label>
										<div class="controls">
											
										  <input type="text" name="details"  id="emailfield" class="input-xlarge" value ='<?php
    echo $details;
?>'  data-rule-minlength="5" placeholder="E-Mail" maxlength="999">
										</div>
									</div>


<div class="control-group">
										<label for="textfield" class="control-label">Days :</label>
										<div class="controls"><span id="sprytextfield2">
										  <input type="text" name="days" id="textfield4" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" placeholder="Days" value ='<?php
    echo $days;
?>'  onKeyPress="return checkIt(event)" maxlength="3">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>


 
    <div class="control-group">
										<label for="textfield" class="control-label">Rate :</label>
										<div class="controls"><span id="sprytextfield4">
										  <input type="text" name="rate" id="textfield6" class="input-xlarge" data-rule-required="true" data-rule-minlength="10" placeholder="Mobile / Phone" value ='<?php
    echo $rate;
?>'  onKeyPress="return checkIt(event)" maxlength="10">
									    <span class="textfieldRequiredMsg">A value is required.</span></span></div>
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
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
}
?>

