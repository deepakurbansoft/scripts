<?php
require 'db_conn.php';
page_protect();
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
<!--	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="../../css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="../../css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="../../css/style.css">
	<!-- Color CSS -->
<!--	<link rel="stylesheet" href="../../css/themes.css">-->
	<!-- Tagsinput -->
	<link rel="stylesheet" href="../../css/plugins/tagsinput/jquery.tagsinput.css">
	<!-- chosen -->
	<link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
	<!-- multi select -->
	<link rel="stylesheet" href="../../css/plugins/multiselect/multi-select.css">
	<!-- timepicker -->
	<link rel="stylesheet" href="../../css/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- colorpicker -->
	<link rel="stylesheet" href="../../css/plugins/colorpicker/colorpicker.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="../../css/plugins/plupload/jquery.plupload.queue.css">

	<!-- imageupload -->
	<link rel="stylesheet" href="../../css/plugins/fileupload_bootstrap/fileinput.min.css">


	<!-- jQuery -->
	<script src="../../js/jquery.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
	<script src="../../js/plugins/jquery-ui/jquery.ui.slider.js"></script>
	<!-- Bootstrap -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="../../js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Masked inputs -->
	<script src="../../js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
	<!-- TagsInput -->
	<script src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
	<!-- Datepicker -->
	<script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Timepicker -->
	<script src="../../js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- Colorpicker -->
	<script src="../../js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
	<!-- Chosen -->
	<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- MultiSelect -->
	<script src="../../js/plugins/multiselect/jquery.multi-select.js"></script>
	<!-- CKEditor -->
	<script src="../../js/plugins/ckeditor/ckeditor.js"></script>
	<!-- PLUpload -->
	<script src="../../js/plugins/plupload/plupload.full.js"></script>
	<script src="../../js/plugins/plupload/jquery.plupload.queue.js"></script>
	<!-- Custom file upload -->
	<script src="../../js/plugins/fileupload/bootstrap-fileupload.min.js"></script>

	<!-- Theme framework -->
	<script src="../../js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="../../js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="../../js/demonstration.min.js"></script>
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

	<!-- imageupload -->
	<script src="../../js/plugins/fileupload_bootstrap/fileinput.js"></script>

	<!-- Charts -->
	<script src="js/plugins/charts/Chart.min.js"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">



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
							<a href="#">Users Graph</a>
							
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
						<div class="box box-bordered box-color">
							<div class="box-title">
									<h3><i class="icon-th-list"></i> Users Graph </h3>
							</div>
							<div class="box-content nopadding">

								<div style="padding: 10px; font-weight: bold;">Users</div>

								<div style="width:50%;" class="pull-left">
									<canvas id="barChart" style="height:230px"></canvas>
								</div>

								<div style="width:40%;" class="pull-right">
									<span class="label label-primary" style="color: #999999;">1</span> Last Year<br><br>
									<span class="label label-success" style="color: #468847;">2</span> Current Year
								</div>
							</div>



					</div>
						</div>
			
							</div>
						</div>
					</div>
				</div>


	<?php include 'common_files/footer.php';?>

	<?php

	$final_count = "";
	$lastyear_count = "";
	for($i=1;$i<=12;$i++) {


		$year = date('Y');

		$add = sprintf("%02d", $i);



		$query = "select * from subsciption WHERE paid_date LIKE '$year-$add%'";


		$result = mysqli_query($con, $query);

		$get_count = mysqli_num_rows($result);

		$final_count .= $get_count.",";

		$last_year = $year-1;
		$query1= "select * from subsciption WHERE paid_date LIKE '$last_year-$add%'";

		$result1 = mysqli_query($con, $query1);

		$get_count1 = mysqli_num_rows($result1);

		$lastyear_count .= $get_count1.",";


	}
$chart_year = rtrim($final_count,',');

$chart_lastyear	= rtrim($lastyear_count,',');
	?>

	<script>
		$(function () {
			/* ChartJS
			 * -------
			 * Here we will create a few charts using ChartJS
			 */

			//--------------
			//- AREA CHART -
			//--------------


			var areaChartData = {
				labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				datasets: [
					{
						label: "Last Year",
						fillColor: "rgba(210, 214, 222, 1)",
						strokeColor: "rgba(210, 214, 222, 1)",
						pointColor: "rgba(210, 214, 222, 1)",
						pointStrokeColor: "#c1c7d1",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data: [<?php echo $chart_lastyear;?>]
					},
					{
						label: "Current Year",
						fillColor: "rgba(60,141,188,0.9)",
						strokeColor: "rgba(60,141,188,0.8)",
						pointColor: "#3b8bba",
						pointStrokeColor: "rgba(60,141,188,1)",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(60,141,188,1)",
						data: [<?php echo $chart_year;?>]
					}
				]
			};

			var areaChartOptions = {
				//Boolean - If we should show the scale at all
				showScale: true,
				//Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines: false,
				//String - Colour of the grid lines
				scaleGridLineColor: "rgba(0,0,0,.05)",
				//Number - Width of the grid lines
				scaleGridLineWidth: 1,
				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines: true,
				//Boolean - Whether the line is curved between points
				bezierCurve: true,
				//Number - Tension of the bezier curve between points
				bezierCurveTension: 0.3,
				//Boolean - Whether to show a dot for each point
				pointDot: false,
				//Number - Radius of each point dot in pixels
				pointDotRadius: 4,
				//Number - Pixel width of point dot stroke
				pointDotStrokeWidth: 1,
				//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				pointHitDetectionRadius: 20,
				//Boolean - Whether to show a stroke for datasets
				datasetStroke: true,
				//Number - Pixel width of dataset stroke
				datasetStrokeWidth: 2,
				//Boolean - Whether to fill the dataset with a color
				datasetFill: true,
				//String - A legend template
				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
				//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio: true,
				//Boolean - whether to make the chart responsive to window resizing
				responsive: true
			};




			//-------------
			//- BAR CHART -
			//-------------
			var barChartCanvas = $("#barChart").get(0).getContext("2d");
			var barChart = new Chart(barChartCanvas);
			var barChartData = areaChartData;
			barChartData.datasets[1].fillColor = "#00a65a";
			barChartData.datasets[1].strokeColor = "#00a65a";
			barChartData.datasets[1].pointColor = "#00a65a";
			var barChartOptions = {
				//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
				scaleBeginAtZero: true,
				//Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines: true,
				//String - Colour of the grid lines
				scaleGridLineColor: "rgba(0,0,0,.05)",
				//Number - Width of the grid lines
				scaleGridLineWidth: 1,
				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines: true,
				//Boolean - If there is a stroke on each bar
				barShowStroke: true,
				//Number - Pixel width of the bar stroke
				barStrokeWidth: 2,
				//Number - Spacing between each of the X value sets
				barValueSpacing: 5,
				//Number - Spacing between data sets within X values
				barDatasetSpacing: 1,
				//String - A legend template
				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
				//Boolean - whether to make the chart responsive
				responsive: true,
				maintainAspectRatio: true
			};

			barChartOptions.datasetFill = false;
			barChart.Bar(barChartData, barChartOptions);


		});
	</script>


</body>

	</html>

