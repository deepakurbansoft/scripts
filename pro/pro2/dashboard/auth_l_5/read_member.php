<?php
require 'db_conn.php';
page_protect();
if (isset($_POST['name'])) {
    
} else {
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
}

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
<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Delete Invoice?"))
                 return true;
else
return false;
      }
  </script>
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
							<a href="#">Dashboard</a>
							
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-inbox"></i>Details of : - <?php
$id     = $_POST['name'];
$query  = "select * from user_data WHERE newid='$id'";
//echo $query;
$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $name = $row['name'];
        echo $name;
    }
}
?>
									
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>Image</th><th>Membership ID</th>									<th>Name</th>										<th>Age / Sex</th>										<th>Join On</th>									
										</tr>
									</thead>
									<tbody>
									<?php


$query  = "select * from user_data WHERE newid='$id'";
//echo $query;
$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        
        
        $location = $row['gym_location'];
        echo "<tr><td><img src='" . $row['pic_add'] . "' width='150'></td>";
        echo "<td>" . $row['newid'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . " / " . $row['sex'] . "</td>";
        echo "<td>" . $row['joining'] . "</td></tr>";
        
        
        
    }
    
    
}

?>									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-inbox"></i>
									Details of : - <?php
$id     = $_POST['name'];
$query  = "select * from user_data WHERE newid='$id'";
//echo $query;
$result = mysqli_query($con, $query);

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $name = $row['name'];
        echo $name;
    }
}
?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>S.No</th><th>Name</th>
											<th>Membership</th>
											<th>Payment Date</th>
											<th>Total  / Paid</th>
											<th>Invoice</th>
											<th>Membership Expiry</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

										<?php
$memid  = $_POST['name'];
$query  = "select * from subsciption WHERE mem_id='$memid'";
//echo $query;
$result = mysqli_query($con, $query);
$sno    = 1;

if (mysqli_affected_rows($con) != 0) {

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $msgid = $row['invoice'];

        echo "<td>" . $sno . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['sub_type_name'] . "</td>";
        echo "<td>" . $paid_date = $row['paid_date'] . "</td>";
        echo "<td>" . $row['total'] . " / " . $row['paid'] . "</td>";
        echo "<td>" . $invoice = get_field('gym_location',$location,'id','invoice_letter').'-'.$row['invoice'] . "</td>";
        echo "<td>" . $row['expiry'] . "</td>";
        

        
        echo "<td>

			<form action='gen_invoice.php' method='post' target='_blank'>
			<input type='hidden' name='name' value='" . $msgid . "'/>
			<input type='submit' value='Print Invoice ' class='btn btn-info'/></form>

			</td>";

					$query_subplan  = "select * from subsciption_sub WHERE invoice='$msgid'";

					$result_subplan = mysqli_query($con, $query_subplan);


					if (mysqli_affected_rows($con) != 0) {

						while ($row_subplan = mysqli_fetch_array($result_subplan, MYSQLI_ASSOC)) {
							$sno++;
						?>
							<tr>
								<td><?php echo $sno;?></td>
								<td></td>
								<td><?php echo get_field('mem_types_sub',$row_subplan['plan_id'],'mem_type_id','name');?></td>
								<td><?php echo $paid_date;?></td>
								<td><?php echo get_field('mem_types_sub',$row_subplan['plan_id'],'mem_type_id','rate');?></td>
								<td><?php echo $invoice;?></td>
								<td><?php echo $row_subplan['expire_date']?></td>
								<td></td>

							</tr>
						<?php
						}
					}


			echo "</tr>";
		$sno++;
		$msgid = 0;
    }
    
}

?>



									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>
				
				
				</div>	</div>
				</div>

<?php include 'common_files/footer.php';?>
	
		
	</body>

	</html>