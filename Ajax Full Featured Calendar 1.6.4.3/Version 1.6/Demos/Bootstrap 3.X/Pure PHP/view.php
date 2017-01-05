<?php 

// Include the calendar class
include('includes/loader.php'); 

// Retrieve Current Page Data
$info = $calendar->retrieve($_GET['page']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajax Full Featured Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="lib/validation/css/validation.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="navbar-brand" href="index.php">Ajax Full Featured Calendar</a>
        </div>
      </div>
    </div>

    <div class="container">
		
      <a href="index.php" class="btn btn-default pull-right" style="margin-bottom: 20px;">Back to Events</a>
 
      <div class="clearfix"></div>
        
      <div class="box">
      
        <div class="header"><h4>Event</h4></div>
        
        <div class="content"> 
            
            <table class="table table-bordered m0 b0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Color</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $info['id']; ?></td>
                  <td><?php echo $info['title']; ?></td>
                  <td><?php echo $info['description']; ?></td>
                  <td><?php echo date('d/m/Y H:i', strtotime($info['start'])); ?></td>
                  <td><?php echo date('d/m/Y H:i', strtotime($info['end'])); ?></td>
                  <td><?php echo $info['color']; ?></td>
                </tr>
              </tbody>
            </table>
             
        </div>
        
    </div>
            
    <button type="submit" onclick="calendar.remove(<?php echo $info['id']; ?>)" class="btn btn-danger pull-right">Delete This Event</button>
    <a href="edit_event.php?page=<?php echo $info['id']; ?>" class="btn btn-info pull-right mr-10">Edit This Event</a>

    <div class="clearfix"></div>

    </div> <!-- /container -->

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.calendar.js"></script>
    <script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="lib/timepicker/bootstrap-timepicker.js"></script>
    <script src="lib/validation/jquery.validationEngine.js"></script>
    <script src="lib/validation/jquery.validationEngine-en.js"></script>
    <script src="js/custom.js"></script>
	
    <script type="text/javascript">
		$().FullCalendarExt({ version: 'php' });
	</script>
    
  </body>
</html>
