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
	<!-- Tagsinput -->
	<link rel="stylesheet" href="../../css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../../css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="../../css/themes.css">


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
	<!-- Bootbox -->
	<script src="../../js/plugins/form/jquery.form.min.js"></script>
	<!-- Validation -->
	<script src="../../js/plugins/validation/jquery.validate.min.js"></script>
	<script src="../../js/plugins/validation/additional-methods.min.js"></script>
	<!-- TagsInput -->
	<script src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Custom file upload -->
	<script src="../../js/plugins/fileupload/bootstrap-fileupload.min.js"></script>

	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="../../img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="../../img/apple-touch-icon-precomposed.png" />
<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="../css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="../css/themes.css">


	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<!-- slimScroll -->
	<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="../js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Bootbox -->
	<script src="../js/plugins/form/jquery.form.min.js"></script>
	<!-- Validation -->
	<script src="../js/plugins/validation/jquery.validate.min.js"></script>
	<script src="../js/plugins/validation/additional-methods.min.js"></script>

	<!-- Theme framework -->
	<script src="../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../js/demonstration.min.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="../img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon-precomposed.png" />
    <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/form/jquery.form.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>

	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
<script src="js/demonstration.min.js"></script>
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
							<a href="#">Edit Profile</a>
							
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
							Edit user profile <span class="alert-info">(You will be required to Login Again After Profile Update) </span></h3>
						  </div>
							<div class="box-content nopadding">
                            <?php
$user_id_auth = $_SESSION['user_data'];

?>
								<form action="submit_changed_details.php" class="form-horizontal form-bordered"  method="post" id="bb">
									<div class="control-group">
										
										<div class="controls">
                                          <p>Login_ID  </p>
                                          <p>
                                            <input type="text" name="login_id" value="<?php
echo $_SESSION['user_data'];
?>" class="uneditable-input"  readonly/>
                                            <span class="help-block">*You cannot change your Username</span></p>
										</div>
								  </div>
									
								  <div class="control-group">
										
									<div class="controls">
									  <p>Full Name </p>
									  <span id="sprytextfield3">
									  <input type="text" name="full_name" id="textfield2"  data-rule-required="true" data-rule-minlength="3" value="<?php
echo $_SESSION['full_name'];
?>" maxlength="25">
									  <span class="textfieldRequiredMsg">A value is required.</span></span></div>
										
								  </div>
									<div class="control-group">
										
										<div class="controls">
										  <p>Sex  </p>
											<p><span id="sprytextfield2">
											  <input type="text" name="sex"  data-rule-required="true" data-rule-minlength="3" value="<?php
echo $_SESSION['sex'];
?>" class="uneditable-input"  readonly>
										    <span class="textfieldRequiredMsg">A value is required.</span></span></p>
										</div>
									</div>
      
									<div class="control-group">
										
										<div class="controls">
											<p>Password</p>
											<p><span class="uneditable-input">*********</span> <a href="change_pwd.php" class="btn">Change password</a>
											  <span class="help-block">*For security reasons hidden</span></p>
										</div>
									</div>
									
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Submit">
<!--										<button type="button" class="btn">Cancel</button>-->
									</div>
							  </form>
						  </div>
						</div>
				  </div>
			  </div>
		  </div>
</div></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>

	<?php include 'common_files/footer.php';?>
		
	
		
	</body>

	</html>


