<!doctype html>
<html>
<head><title>Gym Management - ELITE HOSPITALITY GROUP</title>
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
<!--	<link rel="stylesheet" href="../css/themes.css">-->


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

	<style type="text/css">
		body{
			background: rgba(0, 0, 0, 0) url("../img/gym.png") repeat scroll 100% 30% !important;
			overflow-x: hidden !important;
			overflow-y: auto;
			min-height: 100%;
		}
		.login-body
		{
			background-color: #ffffff !important;

		}
		.wrapper
		{
			/*margin: 0px !important;*/
		}

		.login-body
		{
			-webkit-animation: flip 1s;
			animation: flip 1s;
		}

		@-webkit-keyframes flip {
			from {
				transform: rotateX(90deg)
			}
			to {
				transform: rotateX(0deg)
			}
		}
		@keyframes flip {
			from {
				transform: rotateX(90deg)
			}
			to {
				transform: rotateX(0deg)
			}
		}

	</style>

</head>

<body class='login'>

	<div class="wrapper" style="margin-top: 10%;">

<!--		<h1><a href="index.html">Management</a></h1>-->
<!--		<h1><a href="index.html">System</a></h1>-->
		<div class="login-body" style="box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);">
			<div style="border-bottom: 1px solid #A29061; padding: 10px;">
				<img src="logo_hospitality.png" alt="" class='retina-ready' ><br>
			</div>
		  <h2>SIGN IN</h2>
			<form action="secure_login.php" method='post' class='form-horizontal form-validate' id="bb">
				<div class="control-group">
										<div class="controls">
										  <input type="text" placeholder="User Name" class="input-large" name="user_id_auth" id="textfield" data-rule-minlength="2" data-rule-required="true" style="width: 97%;"></div>
			  </div><p>
                                      <div class="control-group">  
				
                <div class="controls">
											<input type="password" name="pass_key" id="pwfield" class="input-large" data-rule-required="true" data-rule-minlength="1" placeholder="Password" style="width: 97%;">
										</div>
                </div>
										
										
			  <div class="submit">
					<input type="submit" class="btn " style="background-color: #349AC9; color: #ffffff; float: left !important; position:relative; left: 40% !important;" value="Submit">
				</div>
			</form>
<!--			-->
<!--			<div class="forget">-->
<!--				<a href="ajax_f.php"><span>Forgot password?</span></a>-->
<!--			</div>-->

			<div class="forget">
				<a href="http://urbansoft.co/" target="_blank"><span>Developed By UrbanSoft</span></a>
			</div>

		</div>
	</div>

<!-- <div class="alert alert-info">-->
<!--									<center>-->
<!--									<p><a href="http://urbansoft.in">Developed By Urbansoft</a> </p></center>-->
<!--								</div>-->
			</div>
		</div></div>
		

		
	</body>

	</html>
