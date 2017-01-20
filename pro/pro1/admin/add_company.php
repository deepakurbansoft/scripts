<?php
include("db.php");
session_start();

$loginuser = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CBPC | Admin</title>
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

        <?php include("header.php");?>

        <?php include("sidebar.php");?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Company
                <small>Add Company</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class=""><a href="company">Company</a></li>
                <li class="active">Add Company</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="margin: 10px;">
            <!-- Small boxes (Stat box) -->
            <div class="row">

<!-- add coupon form -->

    <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Company Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="insert_company.php" name="company_form" id="company_form" method="POST"  enctype="multipart/form-data">
                  <div class="box-body">

                      <div class="alert alert-success hide" id="alert_div">
                          <strong>Success!</strong> Company Added.
                      </div>
                      <div class="form-group" id="name_field">
                      <label for="inputEmail3" class="col-sm-2 control-label">Company Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
                          <span class="help-block hide">Company Name Already Exist.</span>
                      </div>
                    </div>

                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Company Logo</label>
                          <div class="col-sm-6">
                              <!--input type="file" class="form-control" name="imageUpload" id="imageUpload" placeholder="Company Logo"-->
                              <input type="file" name="company_logo" id="company_logo" required>
                              <div style="color: red; padding-top: 2px;">Image size should be above 300x300.</div>
                          </div>
                      </div>


                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <div class="col-sm-12">
                    <!--button type="submit" class="btn btn-default">Cancel</button-->
                    <button type="submit" name="submit" class="btn btn-info pull-right">Add Company</button>
                  </div><!-- /.box-footer -->
                  </div><!-- /.box-footer -->
                </form>
              </div>


<!-- add coupon form -->

            </div><!-- /.row -->


        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include("footer.php");?>


</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script type="application/javascript">


    $(document).ready(function(){

        $('#company_form1').submit(function(event) { //Trigger on form submit

//            var formData = new FormData($(this)[0]);

            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : 'insert_company.php', //Your form processing file URL
//                data: formData,
                data      : $('#company_form').serialize(),

                success   : function(data) {
                    if (data.success) { //If fails

                        document.getElementById("company_form").reset();
                        $("#alert_div").removeClass("hide");

                        window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 4000);

                    }
                    else {

                        $("#name_field").addClass("has-error");
                        $(".help-block").removeClass("hide");

                    }
                }
            });

            $(document).ajaxStart(function(){
                $(".cancel_button").val("Loading...");
            });

            $(document).ajaxComplete(function(){
                $(".cancel_button").val("Canceled");
            });

            event.preventDefault(); //Prevent the default submit
        });

    })
</script>
</body>
</html>
