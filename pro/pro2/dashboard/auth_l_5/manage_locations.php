
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
<script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Are your sure want to Delete?"))
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

		<div class="container-fluid">


		<?php include 'common_files/header_dashboard.php'; ?>

				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="index.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Locations</a>
							
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

						<br>

						<div class="box box-color box-bordered">

							<a href="new_location.php" class="btn btn-primary ">Add New</a>

						</div>

						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-inbox"></i>
									Locations (Branches)
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Location Name</th>
											<th>Invoice Letter</th>
											<th>Mem ID Letter</th>
											<th>Contact No</th>
											<th>Address</th>
											<th>Logo</th>

											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php


$query  = "select * from gym_location WHERE 1";
//echo $query;
$result = mysqli_query($con, $query);
$sno    = 1;

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $id = $row['id'];
        
        
        echo "<tr><td>" . $sno . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['invoice_letter'] . "</td>";
        echo "<td>" . $row['mem_id_letter'] . "</td>";
        echo "<td>" . $row['contact_no'] . "</td>";
        echo "<td>" . $row['area'] . "</td>";

			?>
			<td> <img src='<?php echo $row['logo'];?>' width='150' style="border: 1px solid #ccc;"></td>
				<?php
        $sno++;
        
        echo "<td><form action='edit_location.php' method='POST' enctype='multipart/form-data'><input type='hidden' name='id' value='" . $id. "'/><input type='submit' value='Edit' class='btn btn-info'/></form><form action='del_location.php' method='post' onSubmit='return ConfirmDelete();'><input type='hidden' name='id' value='" . $id . "'/><input type='submit' value='Delete' class='btn btn-danger'/></form></td></tr>";
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



