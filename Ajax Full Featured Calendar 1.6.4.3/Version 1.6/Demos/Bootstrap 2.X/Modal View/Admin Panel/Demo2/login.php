<?php include('includes/loader.php'); ?>
  
  <?php include('tpl/head.php'); ?>
  
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
