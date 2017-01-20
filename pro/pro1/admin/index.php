<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cashbookpickandclick.com | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#" style="color: #ffffff;"><b>CBPC  </b> - Admin</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>


        <div class="alert alert-danger" id="error" style="display:none;">

        </div>


        <form role="form" name="user_form" id="user_form" action="">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">

                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <!--button type="button" class="btn btn-primary btn-block btn-flat" id="admin_login">Sign In</button-->
					<input type="submit" id="adminlogin" href="#" class="btn btn-block btn-flat" style="background-color: #01657B; color: #ffffff;" value="Login">
					<!--input type="button" id="admin_login" href="#" class="btn btn-primary btn-block btn-flat" value="Login"-->
                </div><!-- /.col -->
            </div>
        </form>



        <a href="../">Back to Main Site</a><br>
<!--        <a href="register.html" class="text-center">Register a new membership</a>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

<script>
//login code

//		$(document).ready(function(){
//
//			$('#user_form').submit(function(event) { //Trigger on form submit
//
//
//
//				event.preventDefault(); //Prevent the default submit
//			});
//
//		})

			$(document).ready(function() {

                $('#user_form').submit(function(event) {

                var username=$("#username").val();
		    	var password=$("#password").val();
				
				if(username == '' && password == '')
				{
					$('#username').css('border', '1px solid #FF0000');
					$('#password').css('border', '1px solid #FF0000');
					return false;
				}
				
				if(username == '')
					{
						//alert("no");
						$('#username').css('border', '1px solid #FF0000');
						return false;
					}
					else{
						$('#username').css('border', '1px solid #A9A9A9');
					}
				if(password == '')
					{
						//alert("no");
						$('#password').css('border', '1px solid #FF0000');
						return false;
					}
					else{
						$('#password').css('border', '1px solid #A9A9A9');
					}
					
					
		        var dataString = 'username='+username+'&password='+password;
				//alert(dataString);
				if($.trim(username).length>0 && $.trim(password).length>0)
			{
				
				//ajax start
					$.ajax({
            type: "POST",
            url: "adminlogin.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(data){
            if(data)
            {
				
          //  $("body").load("main.php").hide().fadeIn(1500).delay(6000);
		  //  window.location.replace("main.php");
		 window.location.replace("dashboard");
            }
            else
            {
				
            // $('#loginbox').shake();
			 //$('#error').show();
			 $("#error").show().delay(3000).fadeOut();
			 $("#login").val('Login')
			 $("#error").html("<b>Error:</b> Invalid User Name and Password. ");
            }
            }
            });
			//ajax end
			}
                    event.preventDefault();
                });
			});
			//login code  end
</script>


</body>
</html>
