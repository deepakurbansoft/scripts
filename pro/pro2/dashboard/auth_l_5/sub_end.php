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
							<a href="#">Ending Membership</a>
							
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
									Ending Membership
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Name / Member ID</th>
											<th>Date of Last Payment</th>
											<th>Plan</th>
											<th>Total / Paid </th>
											<th>Balance</th>
											<th>expiry</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php

					$location =  $_SESSION['gym_location'];
//									var_dump($_SESSION);
					$time    = time();
					$newtime = $time + 864000;
//					$query   = "select * from subsciption WHERE exp_time < $newtime AND renewal='yes'  ORDER BY expiry DESC";

					$query  = "SELECT * FROM subsciption WHERE DATE(expiry) < DATE(NOW()) AND renewal='yes' ORDER BY `subsciption`.`expiry` DESC " ;

//					$query = "SELECT * FROM subsciption INNER JOIN user_data ON  user_data.gym_location = '$location' AND subsciption.exp_time > $newtime AND user_data.wait='no'";
//					echo $query;
					$result  = mysqli_query($con, $query);
					$sno     = 1;

							if (mysqli_affected_rows($con) != 0) {
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											$msgid = $row['mem_id'];
											echo "<td>" . $sno . "</td>";
											echo "<td>" . $row['name'] . " / " . $row['mem_id'] . "</td>";
											echo "<td>" . $row['paid_date'] . "</td>";
											echo "<td>" . $row['sub_type_name'] . "</td>";
											echo "<td>" . $row['total'] . " / " . $row['paid'] . "</td>";
											echo "<td>" . $row['bal'] . "</td>";
											echo "<td>" . $row['expiry'] . "</td>";
											$sno++;

											echo "<td><form action='make_payments.php' method='post'><input type='hidden' name='name' value='" . $row['mem_id'] . "'/><input type='submit' value='Make Payment' class='btn btn-info'/></form></td></tr>";
											$msgid = 0;
										}

									}



//									$query   = "select * from subsciption_sub WHERE 1";
									//echo $query;
									$result  = mysqli_query($con, $query);
									$sno_new     = $sno;

									if (mysqli_affected_rows($con) != 0) {
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											$expiry_date = $row['expire_date'];
											$current_date = date('Y-m-d');

											$date1=date_create($expiry_date);
											$date2=date_create($current_date);
											$diff=date_diff($date1,$date2);
											$day_count = $diff->format("%a");

											if($day_count > 0){

											?>
											<td><?php echo $sno_new ?></td>

											<td><?php echo get_field('user_data',$row['mem_id'],'newid','name')." / ".$row['mem_id']?></td>
											<td><?php echo get_field('subsciption',$row['mem_id'],'mem_id','paid_date')?></td>
											<td><?php echo get_field('mem_types_sub',$row['plan_id'],'mem_type_id','name')?></td>
											<td><?php echo get_field('subsciption',$row['mem_id'],'mem_id','total')?> / <?php echo get_field('subsciption',$row['mem_id'],'mem_id','paid')?></td>
											<td><?php echo get_field('subsciption',$row['mem_id'],'mem_id','bal')?></td>
											<td><?php echo get_field('subsciption_sub',$row['plan_id'],'plan_id','expire_date')?></td>
											<?php
											$sno_new++;

											echo "<td><form action='make_payments.php' method='post'><input type='hidden' name='name' value='" . $row['mem_id'] . "'/><input type='submit' value='Make Payment' class='btn btn-info'/></form></td></tr>";
											$msgid = 0;
										}

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


<?php include 'common_files/footer.php';?>
		
	
		
	</body>

	</html>



