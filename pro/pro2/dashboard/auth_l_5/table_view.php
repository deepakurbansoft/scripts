
<?php
require 'db_conn.php';
page_protect();
?><!doctype html>


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

		<div class="container-fluid">

			<?php include 'common_files/header_dashboard.php';?>

				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="index.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">View Members</a>
							
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
									Members List
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>Membership Expiry</th>
											<th>Name / Member ID</th>
												<th>Address / Contact</th><th>Proof</th>
												<th>E-Mail / Age / Sex</th>
<th>Height / Weight</th>
<th>Date Joined / Member Type</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php


$query  = "select * from user_data ORDER BY joining DESC";
//echo $query;
$result = mysqli_query($con, $query);
$sno    = 1;

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $msgid   = $row['newid'];
        $query1  = "select * from subsciption WHERE mem_id='$msgid' AND renewal='yes'";
        $result1 = mysqli_query($con, $query1);
        if (mysqli_affected_rows($con) == 1) {
            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                
                
                echo "<tr><td>" . $row1['expiry'] . "</td>";
                $expiry        = $row1['expiry'];
                $sub_type_name = $row1['sub_type_name'];
                $msgid1        = $row['name'];
                echo "<td>" . $row['name'] . " / " . $row['newid'] . "<img src='" . $row['pic_add'] . "'></td>";
                echo "<td>" . $row['address'] . " / " . $row['contact'] . "</td>";
                echo "<td>" . $row['proof'] . " / " . $row['other_proof'] . "</td>";
                echo "<td>" . $row['email'] . " / " . $row['age'] . " / " . $row['sex'] . "</td>";
                echo "<td>" . $row['height'] . " / " . $row['weight'] . "</td>";
                echo "<td>" . $row['joining'] . " / " . $row1['sub_type_name'] . "</td>";
                
                $sno++;
                
                echo "<td><form action='new_member_table.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='hidden' name='full_name' value='" . $msgid1 . "'/><input type='submit' value='New Schedule' class='btn btn-info'/></form><form action='view_member_table.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='hidden' name='full_name' value='" . $msgid1 . "'/><input type='submit' value='View Schedule' class='btn btn-warning'/></form></td></tr>";
                $msgid = 0;
            }
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
				</div>

	<?php include 'common_files/footer.php';?>
	
		
	</body>

	</html>



