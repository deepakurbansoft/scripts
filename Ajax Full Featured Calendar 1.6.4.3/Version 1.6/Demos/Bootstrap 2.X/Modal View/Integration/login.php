<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Bootstrap - Integration Sample</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    
    <link href="css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      /* Custom container */
      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      /* Customize the navbar links to be fill the entire space of the .navbar */
      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
    </style>
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="lib/validation/css/validation.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  </head>

  <body class="ical">
  
  <body>
  
  <?php include('tpl/header.php'); ?>
  
  <!-- MAIN -->
    <div id="main" class="container-fluid">
        
        <!-- container content -->
        <div class="container-fluid">
        	
            <div class="row-fluid">
                  
                <div id="main-content"><!-- MAIN CONTENT -->
                                 
                    <form class="form-signin" action="dashboard.php" method="post">
                    
                        <div id="login_logo"></div>
                        
                        <?php if(isset($_SESSION['c_loginMessage'])) { ?>
                        	<div class="alert alert-info">
                            	<?php echo $_SESSION['c_loginMessage']; unset($_SESSION['c_loginMessage']); ?>
                            </div>
                        <?php } ?>
                        
                        <div class="input-prepend">
                        	<span class="add-on"><span class="icon-user"></span></span>
							<input type="text" name="username" class="span11" placeholder="Username">
                        </div>
                        
                        <div class="input-prepend">
                        	<span class="add-on"><span class="icon-lock"></span></span>
                        	<input type="password" name="password" class="span11" placeholder="Password">
                        </div>
                        
                        <label class="inline pull-left">
                         <a href="index.php" class="mt10 pull-left">&larr; Back to site</a>
                        </label>
                        <button class="btn btn-primary pull-right" type="submit">Log in</button>
                        
                        <div class="clear"></div>

                     </form>
                                                           
                </div><!-- // MAIN CONTENT -->
                </div>
            
            </div>
            
		</div>
		<!-- // container content -->
                
        <div class="clear"></div>
        
    </div>
    <!-- // MAIN -->
  
  <?php include('tpl/scripts.php'); ?>
  
  </body>
  
</html>
