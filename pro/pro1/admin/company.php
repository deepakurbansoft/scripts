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

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


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
                <small>Company List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"></i> Company</a></li>
                <li class="active">Company list</li>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Company Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Company Name</th>
                                    <th>Company Logo</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                $i = 1;
                                $select = "SELECT * FROM company WHERE 1";
                                $result = mysql_query($select);
                                while($row_coupon = mysql_fetch_assoc($result)){
                                    //echo $row_coupon['company_name'];
                                    ?>
                                    <tr>

                                        <td><?php echo $i;?></td>
                                        <td><?php echo $row_coupon['name']; ?></td>

                                        <td><img src='companylogos/<?php echo $row_coupon['logo']; ?>' height='40px' width='50px' class="img-responsive"></td>

                                        <td><a href="delete_company.php?id=<?php echo $row_coupon['id']; ?>" onclick="return ConfirmDelete()" title="delete"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;&nbsp;<a href="edit_company?id=<?php echo $row_coupon['id']; ?>" title="edit"><span class="glyphicon glyphicon-pencil"></span></a></td>

                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include("footer.php");?>



</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="js/custom.js"></script>

<script type="text/javascript">

    function ConfirmDelete()
    {
        if (confirm("Are Sure Want to Delete?"))
            return true;
        else
            return false;
    }

    $('.popup_img').popover({
        html: true,
        trigger: 'hover',
        placement: 'bottom',
        content: function(){return '<img src="'+$(this).data('img') + '" class="img-responsive"/>';}
    });

    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

</body>
</html>