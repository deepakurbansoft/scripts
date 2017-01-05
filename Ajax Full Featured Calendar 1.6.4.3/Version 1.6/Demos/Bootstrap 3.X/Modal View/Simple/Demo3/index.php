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
          <!-- search -->
          <form class="pull-right" style="margin-top: 5px;" id="search">
          	<div class="col-lg-12">
                <div class="input-group">
                   <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Search</button>
                  </span>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
		
      <a href="add_event.php" class="btn btn-default pull-right" style="margin-bottom: 20px;">Add Event</a>
       
      <div class="clearfix"></div>
        
      <div class="box">
        <div class="header"><h4>Calendar</h4></div>
        <div class="content"> 
            <div id="calendar"></div>
        </div> 
    </div>

    </div> <!-- /container -->
    
    <!-- Modal View Event -->
    <div id="cal_viewModal" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
			<a href="#" class="btn btn-danger" data-option="remove">Delete</a>
            <a href="#" class="btn btn-info" data-option="edit">Edit</a>
            <a href="#" class="btn btn-warning" data-option="export">Export</a>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <!-- Modal Edit Event -->
    <div id="cal_editModal" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
			<a href="#" class="btn btn-primary" data-option="save">Save Changes</a>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <!-- Modal QuickSave Event -->
    <div id="cal_quickSaveModal" class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-option="quickSave">Add Event</a>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
        
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/gcal.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.calendar.js"></script>
    <script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="lib/timepicker/bootstrap-timepicker.js"></script>
    <script src="lib/validation/jquery.validationEngine.js"></script>
    <script src="lib/validation/jquery.validationEngine-en.js"></script>
    <script src="js/custom.js"></script>
    
    <!-- call calendar plugin -->
    <script type="text/javascript">
		$().FullCalendarExt({
			calendarSelector: '#calendar',
			//weekType: 'agendaWeek',
			//dayType: 'agendaDay',
			//ajaxJsonFetch: 'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
			//gcal: true
		});
	</script>

  </body>
</html>
