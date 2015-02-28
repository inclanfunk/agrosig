@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i> 
			Calendar
			<span>>
			Add events
			</span>
		</h1>
	</div>
</div>
<!-- row -->

<div class="row">

	<div class="col-sm-12 col-md-12 col-lg-3">
		<!-- new widget -->
		<div class="jarviswidget jarviswidget-color-blueDark">
			<header>
				<h2> Add Events </h2>
			</header>

			<!-- widget div-->
			<div>

				<div class="widget-body">
					<!-- content goes here -->

					<form id="add-event-form">
						<fieldset>

							<div class="form-group">
								<label>Select Event Icon</label>
								<div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
									<label class="btn btn-default active">
										<input type="radio" name="iconselect" id="icon-1" value="fa-info" checked>
										<i class="fa fa-info text-muted"></i> </label>
									<label class="btn btn-default">
										<input type="radio" name="iconselect" id="icon-2" value="fa-warning">
										<i class="fa fa-warning text-muted"></i> </label>
									<label class="btn btn-default">
										<input type="radio" name="iconselect" id="icon-3" value="fa-check">
										<i class="fa fa-check text-muted"></i> </label>
									<label class="btn btn-default">
										<input type="radio" name="iconselect" id="icon-4" value="fa-user">
										<i class="fa fa-user text-muted"></i> </label>
									<label class="btn btn-default">
										<input type="radio" name="iconselect" id="icon-5" value="fa-lock">
										<i class="fa fa-lock text-muted"></i> </label>
									<label class="btn btn-default">
										<input type="radio" name="iconselect" id="icon-6" value="fa-clock-o">
										<i class="fa fa-clock-o text-muted"></i> </label>
								</div>
							</div>

							<div class="form-group">
								<label>Event Title</label>
								<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
							</div>
							<div class="form-group">
								<label>Event Description</label>
								<textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
								<p class="note">Maxlength is set to 40 characters</p>
							</div>

							<div class="form-group">
								<label>Select Event Color</label>
								<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
									<label class="btn bg-color-darken active">
										<input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>
										<i class="fa fa-check txt-color-white"></i> </label>
									<label class="btn bg-color-blue">
										<input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">
										<i class="fa fa-check txt-color-white"></i> </label>
									<label class="btn bg-color-orange">
										<input type="radio" name="priority" id="option3" value="bg-color-orange txt-color-white">
										<i class="fa fa-check txt-color-white"></i> </label>
									<label class="btn bg-color-greenLight">
										<input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">
										<i class="fa fa-check txt-color-white"></i> </label>
									<label class="btn bg-color-blueLight">
										<input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">
										<i class="fa fa-check txt-color-white"></i> </label>
									<label class="btn bg-color-red">
										<input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">
										<i class="fa fa-check txt-color-white"></i> </label>
								</div>
							</div>

						</fieldset>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-default" type="button" id="add-event" >
										Add Event
									</button>
								</div>
							</div>
						</div>
					</form>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

		<div class="well well-sm" id="event-container">
			<form>
				<fieldset>
					<legend>
						Draggable Events
					</legend>
					<ul id='external-events' class="list-unstyled">
						<li>
							<span class="bg-color-darken txt-color-white" data-description="Currently busy" data-icon="fa-time">Office Meeting</span>
						</li>
						<li>
							<span class="bg-color-blue txt-color-white" data-description="No Description" data-icon="fa-pie">Lunch Break</span>
						</li>
						<li>
							<span class="bg-color-red txt-color-white" data-description="Urgent Tasks" data-icon="fa-alert">URGENT</span>
						</li>
					</ul>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">
							<span>remove after drop</span> </label>
	
					</div>
				</fieldset>
			</form>

		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-9">

		<!-- new widget -->
		<div class="jarviswidget jarviswidget-color-blueDark">

			<!-- widget options:
			usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

			data-widget-colorbutton="false"
			data-widget-editbutton="false"
			data-widget-togglebutton="false"
			data-widget-deletebutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-custombutton="false"
			data-widget-collapsed="true"
			data-widget-sortable="false"

			-->
			<header>
				<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
				<h2> My Events </h2>
				<div class="widget-toolbar">
					<!-- add: non-hidden - to disable auto hide -->
					<div class="btn-group">
						<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
							Showing <i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu js-status-update pull-right">
							<li>
								<a href="javascript:void(0);" id="mt">Month</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="ag">Agenda</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="td">Today</a>
							</li>
						</ul>
					</div>
				</div>
			</header>

			<!-- widget div-->
			<div>

				<div class="widget-body no-padding">
					<!-- content goes here -->
					<div class="widget-body-toolbar">

						<div id="calendar-buttons">

							<div class="btn-group">
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<div id="calendar"></div>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

	</div>

</div>

@stop

@section('custom-js')

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
	if (!window.jQuery) {
		document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
	}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
	if (!window.jQuery.ui) {
		document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
	}
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="js/app.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>



<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {
	
	pageSetUp();
	

	    "use strict";
	
	    var date = new Date();
	    var d = date.getDate();
	    var m = date.getMonth();
	    var y = date.getFullYear();
	
	    var hdr = {
	        left: 'title',
	        center: 'month,agendaWeek,agendaDay',
	        right: 'prev,today,next'
	    };
	
	    var initDrag = function (e) {
	        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	        // it doesn't need to have a start or end
	
	        var eventObject = {
	            title: $.trim(e.children().text()), // use the element's text as the event title
	            description: $.trim(e.children('span').attr('data-description')),
	            icon: $.trim(e.children('span').attr('data-icon')),
	            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
	        };
	        // store the Event Object in the DOM element so we can get to it later
	        e.data('eventObject', eventObject);
	
	        // make the event draggable using jQuery UI
	        e.draggable({
	            zIndex: 999,
	            revert: true, // will cause the event to go back to its
	            revertDuration: 0 //  original position after the drag
	        });
	    };

	    var addEvent = function (title, priority, description, icon) {
	        title = title.length === 0 ? "Untitled Event" : title;
	        description = description.length === 0 ? "No Description" : description;
	        icon = icon.length === 0 ? " " : icon;
	        priority = priority.length === 0 ? "label label-default" : priority;
	
	        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
	            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
	
	        $("#event-container").effect("highlight", 800);
	
	        initDrag(html);
	    };
	
	    /* initialize the external events
		 -----------------------------------------------------------------*/
	
	    $('#external-events > li').each(function () {
	        initDrag($(this));
	    });
	
	    $('#add-event').click(function () {
	        var title = $('#title').val(),
	            priority = $('input:radio[name=priority]:checked').val(),
	            description = $('#description').val(),
	            icon = $('input:radio[name=iconselect]:checked').val();
	
	        addEvent(title, priority, description, icon);
	    });
	
	    /* initialize the calendar
		 -----------------------------------------------------------------*/
	
	    $('#calendar').fullCalendar({
	
	        header: hdr,
	        buttonText: {
	            prev: '<i class="fa fa-chevron-left"></i>',
	            next: '<i class="fa fa-chevron-right"></i>'
	        },
	
	        editable: true,
	        droppable: true, // this allows things to be dropped onto the calendar !!!
	
	        drop: function (date, allDay) { // this function is called when something is dropped
	
	            // retrieve the dropped element's stored Event Object
	            var originalEventObject = $(this).data('eventObject');
	
	            // we need to copy it, so that multiple events don't have a reference to the same object
	            var copiedEventObject = $.extend({}, originalEventObject);
	
	            // assign it the date that was reported
	            copiedEventObject.start = date.getTime()/1000 + 86400; // Some weird bug. Day keeps shifting back by 1.
	            copiedEventObject.allDay = allDay;

	            console.log(date);

	            $.ajax({
					type: "POST",
					url: 'calendar',
					data: copiedEventObject,
					success: function(response){
						console.log(response);
						response.data.className = response.data.class;
						$('#calendar').fullCalendar('renderEvent', response.data, true);
					},
				});
	
	            // render the event on the calendar
	            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
	            // $('#calendar').fullCalendar('renderEvent', eventObjectFromServer, true);
	
	            // is the "remove after drop" checkbox checked?
	            if ($('#drop-remove').is(':checked')) {
	                // if so, remove the element from the "Draggable Events" list
	                $(this).remove();
	            }
	
	        },

	        eventDrop: function( event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view ) {
	        	var copiedEventObject = $.extend({}, event);
	        	copiedEventObject.start = copiedEventObject.start.getTime()/1000;
	        	if(copiedEventObject.end != null){
	        		copiedEventObject.end = copiedEventObject.end.getTime()/1000;
	        	}
	        	console.log(copiedEventObject);
				$.ajax({
					type: "PUT",
					url: 'calendar/' + copiedEventObject.id,
					data: copiedEventObject,
					success: function(response){
						console.log(response);
					},
				});
	        },

	        eventResize: function( event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ) {
	        	var copiedEventObject = $.extend({}, event);
	        	copiedEventObject.start = copiedEventObject.start.getTime()/1000;
	        	if(copiedEventObject.end != null){
	        		copiedEventObject.end = copiedEventObject.end.getTime()/1000;
	        	}
	        	console.log(copiedEventObject);
				$.ajax({
					type: "PUT",
					url: 'calendar/' + copiedEventObject.id,
					data: copiedEventObject,
					success: function(response){
						console.log(response);
					},
				});
	        },

	        events: 'calendar',
	
	        select: function (start, end, allDay) {
	            var title = prompt('Event Title:');
	            if (title) {
	                calendar.fullCalendar('renderEvent', {
	                        title: title,
	                        start: start,
	                        end: end,
	                        allDay: allDay
	                    }, true // make the event "stick"
	                );
	            }
	            calendar.fullCalendar('unselect');
	        },
	
	        eventRender: function (event, element, icon) {
	            if (!event.description == "") {
	                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
	                    "</span>");
	            }
	            if (!event.icon == "") {
	                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
	                    " '></i>");
	            }
	        },
	
	        windowResize: function (event, ui) {
	            $('#calendar').fullCalendar('render');
	        }
	    });
	
	    /* hide default buttons */
	    $('.fc-header-right, .fc-header-center').hide();

	
		$('#calendar-buttons #btn-prev').click(function () {
		    $('.fc-button-prev').click();
		    return false;
		});
		
		$('#calendar-buttons #btn-next').click(function () {
		    $('.fc-button-next').click();
		    return false;
		});
		
		$('#calendar-buttons #btn-today').click(function () {
		    $('.fc-button-today').click();
		    return false;
		});
		
		$('#mt').click(function () {
		    $('#calendar').fullCalendar('changeView', 'month');
		});
		
		$('#ag').click(function () {
		    $('#calendar').fullCalendar('changeView', 'agendaWeek');
		});
		
		$('#td').click(function () {
		    $('#calendar').fullCalendar('changeView', 'agendaDay');
		});			

})

</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
	var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		_gaq.push(['_trackPageview']);
	
	(function() {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();

</script>

@stop