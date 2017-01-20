<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['name'])) {
    $memid = $_POST['name'];
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
							<a href="#">Edit User</a>
							
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
								<h3><i class="icon-th-list"></i> Edit User Details </h3>
							</div>
							<div class="box-content nopadding">
								<form action="submit_trainer_edit.php" method="POST" class='form-horizontal form-bordered' enctype="multipart/form-data">

								<input type="hidden" value="<?php echo $memid;?>" name="id" id="id">
                                    <?php

                                        $query  = "select * from auth_user WHERE id='$memid'";
                                        //echo $query;
                                        $result = mysqli_query($con, $query);
                                        $sno    = 1;

                                        if (mysqli_affected_rows($con) == 1) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $name    = $row['name'];
                                                $user_name    = $row['login_id'];
                                                $mobile    = $row['mobile'];
                                                $email    = $row['email'];
                                                $gym_location = $row['gym_location'];
                                                $gender = $row['sex'];
                                                $password = $row['pass_key'];
                                                $profile_photo = $row['profile_photo'];
                                            }
                                        }
                                    ?>


                    <div class="control-group">
                          <label for="textfield" class="control-label">Name :</label>
                           <div class="controls"><span id="sprytextfield1">
                            <input type="text" name="name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" value ='<?php echo $name; ?>' placeholder="User Name" maxlength="100">
                            <span class="textfieldRequiredMsg">A value is required.</span></span></div>
                    </div>

                    <div class="control-group">
                          <label for="textfield" class="control-label">User Name :</label>
                           <div class="controls"><span id="sprytextfield1">
                            <input type="text" name="user_name" id="textfield3" class="input-xlarge" data-rule-required="true" data-rule-minlength="4" value ='<?php echo $user_name; ?>' placeholder="User Name" maxlength="100" disabled>
                            <span class="textfieldRequiredMsg">A value is required.</span></span></div>
                    </div>

                    <div class="control-group">

                        <?php
                        if($profile_photo!=''){?>
                        <label for="textfield" class="control-label">Uploaded Photo :</label>
                        <?php }?>
                        <div class="controls">
                            <?php
                            if($profile_photo!=''){?>
                            <img src='<?php echo $profile_photo; ?>' width="150" style="border: 1px solid #ccc;"><br><br>
                            <?php }?>
                            <!--											<a href="javascript:;" class="btn btn-primary" onclick="return del_photo()">Remove</a>-->

                            Upload New Photo : <input id="photo" name="photo" type="file" multiple=false>

                        </div>

                    </div>

                    <div class="control-group">
                        <label for="textfield" class="control-label">Mobile :</label>
                        <div class="controls"><span id="sprytextfield2">
                          <input type="text" name="mobile" id="textfield4" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" placeholder="Mobile" value ='<?php echo $mobile; ?>'  onKeyPress="return checkIt(event)" maxlength="10">
                        <span class="textfieldRequiredMsg">A value is required.</span></span></div>
					</div>

                    <div class="control-group">
                        <label for="emailfield" class="control-label">Email :</label>
                        <div class="controls">

                          <input type="text" name="email"  id="emailfield" class="input-xlarge" data-rule-required="true" value ='<?php echo $email; ?>'  data-rule-minlength="5" placeholder="E-Mail" maxlength="999">
                        </div>
				    </div>



                    <div class="control-group">
                        <label for="textfield" class="control-label">Gender :</label>
                        <div class="controls"><span id="spryselect1">
                          <select name="gender" id="bbb" data-rule-required="true">
                              <option value="">-- Please select --</option>
                              <option value="male" <?php if($gender=='male'){?> selected <?php } ?> >Male</option>
                              <option value="female" <?php if($gender=='female'){?> selected <?php } ?> >Female</option>
                          </select>
                        <span class="selectRequiredMsg">Please select an item.</span></span></div>
                    </div>

                    <div class="control-group">
                        <label for="emailfield" class="control-label">Password :</label>
                        <div class="controls"><span id="sprytextfield3">
                          <input type="password" name="password"  id="passwordfield" class="input-xlarge" data-rule-required="true" value ="<?php echo $password;?>"  data-rule-minlength="5" placeholder="Password" maxlength="999">
                        <span class="textfieldRequiredMsg">A value is required.</span></span>
                        </div>
				    </div>

                    <div class="control-group">
                        <label for="textfield" class="control-label">Location :</label>
                        <div class="controls"><span id="spryselect2">

                         <select style="margin-right: 10px;" name="gym_location">
										<option value="">Select Location</option>

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

												<option value="<?php echo $row['id'] ?>" <?php if($gym_location==$row['id']){?> selected <?php }?>><?php echo $row['name'] ?></option>

												<?php

											}
										}



										?>

									</select>

                        <span class="textfieldRequiredMsg">A value is required.</span></span></div>
                    </div>
   
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Update User</button>
										
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
//        var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
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

