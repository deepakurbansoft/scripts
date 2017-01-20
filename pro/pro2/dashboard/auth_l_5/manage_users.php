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
            if (confirm("Delete User?"))
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
							<a href="#">Users</a>
							
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

							<a href="new_user.php" class="btn btn-primary ">Add New</a>

						</div>

						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-inbox"></i>
									Users List
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-nomargin dataTable dataTable-tools  table-bordered">
									<thead>
										<tr>
											<th>S.No</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Email</th>
											<th>Location</th>
											<th>User Type</th>
											<th>Photo</th>

											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php

				$user_array = array('admin','General Manager','Gym Trainer');
if($_SESSION['auth_type']==1){
	$query  = "select * from auth_user WHERE `auth_type` = '3' OR `auth_type` = '2'";
}else{
	$location = $_SESSION['gym_location'];
	$query  = "select * from auth_user WHERE `auth_type` = '3' AND `gym_location` = '$location' ";
}

//echo $query;
$result = mysqli_query($con, $query);
$sno    = 1;

if (mysqli_affected_rows($con) != 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $msgid = $row['id'];
        
        
        echo "<tr><td>" . $sno . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . get_field('gym_location',$row['gym_location'],'id','name')  . "</td>";
		$user = $row['auth_type']-1;
		echo "<td>" . $user_array[$user] . "</td>";
		echo "<td><img src='" . $row['profile_photo'] . "' width='40'/></td>";


        
        $sno++;
        
        echo "<td><form action='edit_trainer.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Edit' class='btn btn-info'/></form><form action='del_trainer.php' method='post' onSubmit='return ConfirmDelete();'><input type='hidden' name='id' value='" . $msgid . "'/><input type='submit' value='Delete' class='btn btn-danger'/></form></td></tr>";
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



