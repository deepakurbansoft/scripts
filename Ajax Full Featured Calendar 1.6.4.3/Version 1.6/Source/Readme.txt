This files are the source and the core of the calendar, the basic logic to make all the calendar work.

You are able to use the demos as your application and you can use them to improve your own or use as a reference to your creations.

The demos are ready to you use.


A: Why so many modal demos and 1 demo php?
R: 
For the modal demos:
I created this demos based on users needs, you probably would want just to have the basic features and use it as a basic calendar, 
or you would want to use all the features or even you would want to add some stuffs that is not available on this demo.


For the php demo:
The php version its there for users that want to have the calendar as a 'timetable' and when they click on the event it goes to a page
that contains all the necessary information about that particular event, there could be pictures, and other informations, apart from the
modal version it just ajax displays the event and the description of the event in a cool way.


------------------------------------------------------------------------------------------------------------------------------------------
Developing or Improving application ?
------------------------------------------------------------------------------------------------------------------------------------------


The cal_ files
------------------

You will need the 'cal_' files on the demo. These files interact with the calendar on both version

cal_delete - is the file that handles the process of deleting an event.
cal_edit_update - is the file that handles the process of updating form data to the database
cal_events - is the file that is converted to json format so that the events are displayed to the calendar
cal_export - is the file that handles the process of exporting an event.
cal_quicksave - is the file that handles the process of quick save feature of calendar
cal_save - is the file that handles the process of saving form data to the database
cal_update - is the file that handles the process of updating the event stats: resize and drop of the calendar


The Calendar Class
-------------------

calendar is the php class that makes the calendar dynamic. There are pre-built functions for handling calendars of this type.


The jquery calendar plugin
--------------------------

This is a extendable plugin for the fullcalendar. It makes possible to manage dynamic data (php and mysql) and its ajax. 

On bootstrap 3.X it just was replaced the class input-block-level to the class form-control, so when you migrate just do a search and replace to your jquery.calendar.js from boostrap 2.x and its done.


Jquery Dependencies
-------------------

This plugins depends of the jquery, jquery fullcalendar, jquery ui and twitter bootstrap in order for the calendar and its ajax features work,
some other files there are more for interactivity and usability.

