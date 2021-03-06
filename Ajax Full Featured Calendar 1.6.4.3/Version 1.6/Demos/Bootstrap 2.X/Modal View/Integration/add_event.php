<?php include('includes/loader.php'); ?>

  <?php include('tpl/head.php'); ?>

  <body class="ical">

    <?php include('tpl/header.php'); ?>

    <div class="container">
	  
      <a href="dashboard.php" class="btn pull-right" style="margin-bottom: 20px;">View Events</a>
		
      <div class="clearfix"></div>
        
      <div class="box">
        <div class="header"><h4>Add Event</h4></div>
        <div class="content pad"> 
            
            <form id="add_event">
            
                <label>Title:</label>
                <input type="text" class="validate[required] input-block-level" name="title" placeholder="Event Title" id="title">
                <label>Description:</label>
                <textarea class="input-block-level" name="description" id="description" placeholder="Event Description"></textarea>
                <div class="pull-left mr-10">
                <label>Start Date:</label>
                <input type="text" name="start_date" class="validate[required]" id="datepicker">
                </div>
                <div class="pull-left">
                <label>Start Time:</label>
                <input type="text" class="input-small" name="start_time" placeholder="HH:MM:SS" id="tp1">
                </div>
                <div class="clearfix"></div>
                <div class="pull-left mr-10">
                <label>End Date:</label>
                <input type="text" name="end_date" id="datepicker2">
                </div>
                <div class="pull-left">
                <label>End Time:</label>
                <input type="text" class="input-small" name="end_time" placeholder="HH:MM:SS" id="tp2">
                </div>
                <div class="clearfix"></div>
                <label>Event Color:</label>
                <input type="text" class="input-small" name="color" id="cp">
                <label>Display Time:</label>
                <select name="allDay">
                    <option value="true" selected>Yes</option>
                    <option value="false">No</option>
                </select>
                <label>Category:</label>
                <select name="categorie">
				<?php if($calendar->getCategories() !== false) { ?>
                    <?php foreach($calendar->getCategories() as $categorie) { ?>
                    <option value="<?php echo $categorie; ?>"><?php echo $categorie; ?></option>
                    <?php } ?>
                <?php } else { ?>
                	<option value="General">General</option>
                <?php } ?>
                </select>
                <label>Url:</label>
                <input type="text" class="input-block-level" name="url" id="url" placeholder="http://www.domain.com">
                <p class="help-block">Hint: If this event does not have url please leave blank</p>
    
                <button type="submit" onClick="calendar.save()" class="btn btn-primary pull-right">Add Event</button>
                
            </form>
            
        </div> 
    </div>

    </div> <!-- /container -->

    <?php include('tpl/scripts.php'); ?>
    
    <script type="text/javascript">
		$().FullCalendarExt();
	</script>

  </body>
</html>
