<?php include('includes/loader.php'); ?>

  <?php include('tpl/head.php'); ?>

  <body>

    <?php include('tpl/header.php'); ?>
	
    <div class="container">
		
      <a href="add_event.php" class="btn btn-default pull-right" style="margin-bottom: 20px;">Add Event</a>
       
      <div class="clearfix"></div>
      
      <!-- Filter by Category -->
      <?php if($calendar->getCategories() !== false) { ?>
      <form id="filter-category">
          <select style="margin-bottom: 20px;">
            <option <?php if(isset($_SESSION['filter']) && $_SESSION['filter'] == 'all-fields'): echo 'selected '; endif; ?>value="all-fields">All</option>
            <?php foreach($calendar->getCategories() as $categorie) { ?>
            <option <?php if(isset($_SESSION['filter']) && $_SESSION['filter'] == $categorie): echo 'selected '; endif; ?>value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
            <?php } ?>
          </select>
      </form>
      <?php } ?>
      
      <!-- Calendar -->
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
     
  <?php include('tpl/scripts.php'); ?>
    
    <!-- call calendar plugin -->
    <script type="text/javascript">
		$().FullCalendarExt({
			calendarSelector: '#calendar',
			quickSaveCategory: '<label>Category: </label><select name="categorie"><?php foreach($calendar->getCategories() as $categorie) { ?> <option value="<?php echo $categorie?>"><?php echo $categorie; ?></option><?php } ?></select>',
			//weekType: 'agendaWeek',
			//dayType: 'agendaDay',
			//ajaxJsonFetch: 'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
			//gcal: true
		});
	</script>

  </body>
</html>
