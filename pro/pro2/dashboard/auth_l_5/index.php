<?php
require 'db_conn.php';
page_protect();
$gym_location = $_SESSION['gym_location'];

if($gym_location == ''){
	$bg_img = 'img/logo_hospitality.png';
}
else{
	$bg_img = get_field('gym_location',$gym_location,'id','bg_img');
}

?>
<!doctype html>
<head>

	<title>Gym Management - ELITE HOSPITALITY GROUP</title>

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

	<style type="text/css">

		.bg_img{
			background: rgba(0, 0, 0, 0) url("<?php echo $bg_img;?>") no-repeat;
			background-position:center bottom ;

			background-size: 40%;
		}

		.tiles li{
			opacity: 0.8;
		}

		.tiles li:hover{
			opacity:1.00;
		}
	</style>
</head>

<body>

<?php include 'common_files/nav_top.php';?>
	
<div class="container-fluid bg_img" id="content">
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
							<a href="#">Dashboard</a>
							
						</li>
						
					</ul>

					<div class="close-bread">
						<a href="#">
							<i class="icon-remove"></i>
						</a>
					</div>
				</div>

				<div class="row-fluid ">

					<div class="span12">

						<ul class="tiles">


								<li class="red long">
									<a href="sub_end.php">
									<span class='count'><i class="icon-star"></i> <?php

										$time    = time();
										$newtime = $time + 864000;
//										$query   = "select COUNT(*) from subsciption WHERE exp_time < $newtime  AND renewal='yes' ORDER BY expiry DESC";
										$query   = "select COUNT(*) from subsciption WHERE DATE(expiry) < DATE(NOW()) AND renewal='yes'";
//										SELECT * FROM subsciption WHERE DATE(expiry) < DATE(NOW())
										//echo $query;
										$result = mysqli_query($con, $query);
										$i      = 1;
										if (mysqli_affected_rows($con) != 0) {
											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												echo $row['COUNT(*)'];
											}
										}
										$i = 1;
										?></span>
										<span class='name'>Ending Membership</span></a>
								</li>


								<li class="orange long">
									<a href="unpaid.php"><span class='count'><i class="icon-money"></i> <?php
											$date  = date('Y-m');
											//										if($_SESSION['auth_type']==1){
											//											$query = "select COUNT(*) from subsciption INNER JOIN user_data ON bal>0 AND user_data.wait='no'";
											//										}else{
											//											$location = $_SESSION['gym_location'];
											//											$query = "select COUNT(*) from subsciption INNER JOIN user_data ON bal>0 AND user_data.gym_location = '$location' AND user_data.wait='no'";
											//										}

											$query = "select COUNT(*) from subsciption WHERE bal>0";

											//echo $query;
											$result = mysqli_query($con, $query);
											$i      = 1;
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													echo $row['COUNT(*)'];
												}
											}
											$i = 1;
											?></span>
										<span class='name'>Unpaid Members</span></a>
								</li>
							<?php

							if($_SESSION['auth_type']==1  ){

								?>
							<?php
							}else{

								?>

								<li class="red long">
									<a href="view_mem.php">
									<span class='count'><i class="icon-star"></i>

										<?php
										$date  = date('Y-m');

										if($_SESSION['auth_type']== 1) {
											$query = "select COUNT(*) from user_data WHERE wait='no'";
										}
										else{

											$query = "select COUNT(*) from user_data WHERE wait='no' AND gym_location='$loc'";
										}
										//echo $query;
										$result = mysqli_query($con, $query);
										$i      = 1;
										if (mysqli_affected_rows($con) != 0) {
											while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												echo $row['COUNT(*)'];
											}
										}
										$i = 1;
										?>

									</span>
										<span class='name'>Total Members</span></a>
								</li>

							<?php
//							$location = $_SESSION['gym_location'];

							}

							?>





							

							<?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>
							<li class="blue">
								<a href="more-userprofile.php"><span><i class="icon-cogs"></i></span><span class='name'>Settings</span></a>
							</li>
							<?php }?>

							<li class="green">
								<a href="new_entry.php"><span><i class="icon-money"></i></span><span class='name'>New Member</span></a>
							</li>

							<li class="lime ">
								<a href="view_mem.php"><span><i class="icon-dashboard"></i></span><span class='name'>View / Edit</span></a>
							</li>

							<?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>
							<li class="blue">
								<a href="new_plan.php"><span><i class="icon-shopping-cart"></i></span><span class='name'>New Plan - Main</span></a>
							</li>
							<?php }?>

							<?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>
							<li class="red long">
								<a href="view_mem.php"><span><i class="icon-eye-open"></i></span><span class='name'>Generate Invoice</span></a><li class="blue long">
								<a href="view_plan_sub.php"><span><i class="icon-cogs"></i></span><span class='name'>Plan Details - Sub</span></a>
							</li>
							<?php }?>

							<li class="orange long">
								<a href="over_members_year.php"><span><i class="icon-calendar"></i></span><span class='name'>Members By Year</span></a>
							</li>

							<?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>
							<li class="blue long">
								<a href="revenue_month.php"><span><i class="icon-bolt"></i></span><span class='name'>Revenue By Month</span></a>
							</li>


							<li class="green long">
								<a href="view_plan.php"><span><i class="icon-eye-open"></i></span><span class='name'>Plan Details - Main</span></a>
							</li>
							<?php }?>

							<li class="green long">
								<a href="ending_memberdays.php"><span><i class="icon-star"></i></span><span class='name'>Expiring in 5, 15 & 30 days.</span></a>
							</li>

<!--							<li class="orange long">-->
<!--								<a href="payments.php"><span><i class="icon-calendar"></i></span><span class='name'>Make Payments</span></a>-->
<!--							</li>-->

							<li class="orange long">
								<a href="compare_year.php"><span><i class="icon-calendar"></i></span><span class='name'>Compare year Graphs</span></a>
							</li>
<!---->
<!--							<li class="green long">-->
<!--								<a href="mail_tracking.php"><span><i class="icon-eye-open"></i></span><span class='name'>Mail Tracking</span></a>-->
<!--							</li>-->

							<li class="red">
								<a href="logout.php"><span class='count'><i class="icon-star"></i> </span><span class='name'>Logout</span></a>
							</li>

						</ul>
					</div>

				</div>
				
				
	  </div>

  </div>

</div>

<?php include 'common_files/footer.php';?>
	
		
</body>

</html>

