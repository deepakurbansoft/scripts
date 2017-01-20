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

			<?php include 'common_files/header_dashboard.php';?>

				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="index.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>

						<li>
							<a href="more-userprofile.php">Edit Profile</a>
							<i class="icon-angle-right"></i>
						</li>

						<li>
							<a href="#">Change Password</a>

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
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-ok"></i>
									Change Password
								</h3>
							</div>
							<div class="box-content">
								<form action="change_s_pwd.php" method="POST" class='form-horizontal form-validate' id="bb">
									<div class="control-group">
										<label for="textfield" class="control-label">Login ID :  </label>
										<div class="controls">
	
                                            <input type="text" name="login_id" value="<?php echo $_SESSION['user_data']; ?>" class="uneditable-input"  readonly/>
                                            </p>
										</div>
									</div>

<!--									<div class="control-group">-->
<!--										<p>Login Key :	</p>-->
<!--										<div class="controls">-->
<!--									<span id="sprytextfield1">-->
<!--									<input type="text" name="login_key"  class="input-xlarge" data-rule-required="true" placeholder="Your secert key">-->
<!--									<span class="textfieldRequiredMsg">A value is required.</span></span> * (Your Login Key is Required) </div>-->
<!---->
<!--									</div>-->

									<div class="control-group">
										Password :
									  <div class="controls"><span id="sprytextfield3">
									    <input type="text" name="pwfield" id="pwfield" class="input-xlarge" data-rule-required="true" data-rule-minlength="1" placeholder="Your new passowrd">
								      <span class="textfieldRequiredMsg">A value is required.</span></span></div>
								    <span id="sprytextfield2"></span>									</div>

									<div class="control-group">
										Confirm password :
									  <div class="controls"><span id="sprytextfield4">
									    <input type="text" name="confirmfield" id="confirmfield" class="input-xlarge" data-rule-equalto="#pwfield" data-rule-required="true" data-rule-minlength="1" placeholder="Confirm Your new passowrd">
								      <span class="textfieldRequiredMsg">A value is required.</span></span></div>
									</div>

									<div class="control-group">
									  <div class="controls"></div>
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
				<div class="row-fluid">
					<div class="span12"></div>
				</div>
			</div>
		</div></div>


<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>

<?php include 'common_files/footer.php';?>
		
	</body>

	</html>

