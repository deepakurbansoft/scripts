<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['from'])) {
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
	<!-- dataTables -->
	<link rel="stylesheet" href="../../css/plugins/datatable/TableTools.css">
	<!-- chosen -->
	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
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
	<!-- dataTables -->
	<script src="../../js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="../../js/plugins/datatable/TableTools.min.js"></script>
	<script src="../../js/plugins/datatable/ColReorder.min.js"></script>
	<script src="../../js/plugins/datatable/ColVis.min.js"></script>
	<!-- Chosen -->
	<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>

	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>
<body>

<?php include 'common_files/nav_top.php';?>

<div class="container-fluid" id="content">
  <div id="main">


	  <?php include 'common_files/header_dashboard.php'; ?>

				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="index.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>

						<li>
							<a href="revenue_month.php">Revenue By Month</a>
                            <i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Payments List</a>

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
									<i class="icon-inbox"></i>
                        <?php
                        $from = $_POST['from'];
                        $to   = $_POST['to'];
                        ?>

Members Payments : <?php echo $from; ?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>S.No</th><th>Membership ID</th>									<th>Name</th>										<th>Total / Paid</th>										<th>Expiry</th>
<th>Payment Date</th><th>invoice</th>
										</tr>
									</thead>
									<tbody>
									<?php


    $query  = "select * from subsciption WHERE paid_date LIKE '$from%'";
    //echo $query;
    $result = mysqli_query($con, $query);
    $sno    = 1;
    $total  = 0;
    if (mysqli_affected_rows($con) != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {



            echo "<tr><td>" . $sno . "</td>";
            echo "<td>" . $row['mem_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['total'] . " / " . $row['paid'] . "</td>";
            echo "<td>" . $row['expiry'] . "</td>";
            echo "<td>" . $row['paid_date'] . "</td>";
            echo "<td>" . $row['invoice'] . "</td>";
            $total = $total + $row['total'];
            $sno++;

        }


    }

?>
									</tbody>
								</table>
							</div><h4>Total Payments in This Search : <?php
    echo $sno - 1;
?></h4><h4>Total Income in This Search : <?php
    echo $total;
?></h4>
						</div>
					</div>
					</div>
				</div>


				</div>	</div>
				</div>

	<?php include 'common_files/footer.php';?>



	</body>

	</html>
<?php
}

?>


