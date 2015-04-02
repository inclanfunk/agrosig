@extends('layouts.master')

@section('content')

<style type="text/css">

	#infoTab ul{
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}

	div#infoTab li:before{
		font-family: 'FontAwesome';
		content: '\f013';
		margin:0 5px 0 3px;
	}

</style>

<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		<ul id="sparks" class="">
			<li class="sparks-info">
				<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
				<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
					1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
				</div>
			</li>
			<li class="sparks-info">
				<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;45%</span></h5>
				<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
					110,150,300,130,400,240,220,310,220,300, 270, 210
				</div>
			</li>
			<li class="sparks-info">
				<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
				<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
					110,150,300,130,400,240,220,310,220,300, 270, 210
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">
		<article class="col-sm-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-6" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
					<h2>Working Order Costs</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<div id="saleschart" class="chart"></div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
	</div>

	<!-- end row -->

	<!-- row -->

	<div class="row">

		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- new widget -->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

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
					<span class="widget-icon"> <i class="fa fa-comments txt-color-white"></i> </span>
					<h2> SmartChat </h2>
					<!-- <div class="widget-toolbar">
						<div class="btn-group">
							<button class="btn dropdown-toggle btn-xs btn-success" data-toggle="dropdown">
								Status <i class="fa fa-caret-down"></i>
							</button>
							<ul class="dropdown-menu pull-right js-status-update">
								<li>
									<a href="javascript:void(0);"><i class="fa fa-circle txt-color-green"></i> Online</a>
								</li>
								<li>
									<a href="javascript:void(0);"><i class="fa fa-circle txt-color-red"></i> Busy</a>
								</li>
								<li>
									<a href="javascript:void(0);"><i class="fa fa-circle txt-color-orange"></i> Away</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);"><i class="fa fa-power-off"></i> Log Off</a>
								</li>
							</ul>
						</div>
					</div> -->
				</header>

				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<div>
							<label>Title:</label>
							<input type="text" />
						</div>
					</div>
					<!-- end widget edit box -->

					<div class="widget-body widget-hide-overflow no-padding">
						<!-- content goes here -->

						<!-- CHAT CONTAINER -->
						<div id="chat-container">
							<span class="chat-list-open-close"><i class="fa fa-users" title="Chatrooms"></i></span>

							<div class="chat-list-body custom-scroll">
								<ul id="chat-users">
									@foreach($users as $user)
										@if($user->last_active->diffInMinutes(Carbon::now()) < 10)
											<li>
												<a href="javascript:void(0);"><img src="{{ $user->photo ? '/photos/' . $user->photo : '/img/avatar.png' }}" alt="">{{ $user->first_name }} {{ $user->last_name }} <span class="state"><i class="fa fa-circle txt-color-green pull-right"></i></span></a>
											</li>
										@elseif($user->last_active->diffInMinutes(Carbon::now()) > 10)
											<li>
												<a href="javascript:void(0);"><img src="{{ $user->photo ? '/photos/' . $user->photo : '/img/avatar.png' }}" alt="">{{ $user->first_name }} {{ $user->last_name }} <span class="state"><i class="last-online pull-right">{{ $user->last_active->diffForHumans() }}</i></span></a>
											</li>
										@endif
									@endforeach
								</ul>
							</div>
							<div class="chat-list-footer">

								<div class="control-group">

									<form class="smart-form">

										<section>
											<label class="input">
												<input type="text" id="filter-chat-list" placeholder="Filter">
											</label>
										</section>

									</form>

								</div>

							</div>

						</div>

						<!-- CHAT BODY -->
						<div id="chat-body" class="chat-body custom-scroll">
							<div class="text-center text-info" id="click"><a id="load" href="javascript:void(0);">Click to load older messages</a></div>
							<ul id="chat">
								
							</ul>

						</div>

						<!-- CHAT FOOTER -->
						<div class="chat-footer">

							<!-- CHAT TEXTAREA -->
							<div class="textarea-div">

								<div class="typearea">
									<textarea placeholder="Write a reply..." id="textarea-expand" class="custom-scroll"></textarea>
								</div>

							</div>

							<!-- CHAT REPLY/SEND -->
							<span class="textarea-controls">
								<button id="reply" class="btn btn-sm btn-primary pull-right">
									Reply
								</button> <span class="pull-right smart-form" style="margin-top: 3px; margin-right: 10px;"> <label class="checkbox pull-right">
										<input type="checkbox" name="subscription" id="subscription">
										<i></i>Press <strong> ENTER </strong> to send </label> </span> <a href="javascript:void(0);" class="pull-left"><i class="fa fa-camera fa-fw fa-lg"></i></a> </span>

						</div>

						<!-- end content -->
					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

			<!-- new widget -->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false">

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
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">

						<input class="form-control" type="text">

					</div>
					<!-- end widget edit box -->

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

		</article>

		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- new widget -->
			<div class="jarviswidget" id="wid-id-2" data-widget-deletebutton="false" data-widget-colorbutton="false" data-widget-editbutton="false">

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
					<span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
					<h2>Equipment</h2>
				</header>

				<!-- widget div-->
				<div>

					<div class="widget-body no-padding">

						<!-- content goes here -->

						<div id="map" style="width: 100%; height: 300px;"></div>

						<div id="infoTab"></div>

					</div>

						<!-- end content -->

					</div>

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-5" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Forum Activity</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">
						<p><b>Recent Posts</b></p>
						
						<div class="table-responsive">
						
							<table class="table borderless">
								<thead>
									<tr>
										<th>Post</th>
										<th>Topic</th>
										<th class="text-right">Replies</th>
										<th class="text-right">Last Reply</th>
									</tr>
								</thead>
								<tbody>
									@foreach($posts as $post)
										<tr>
											<td><a href='/posts/{{ $post->id }}'>{{ $post->title }}</a></td>
											<td><a href='/forum/topics/{{ $post->topic->id }}'>{{ $post->topic->title }}</a></td>
											<td class="text-right">{{ $post->replies->count() }}</td>
											<td class="text-right">
												@if($post->replies->count())
													{{ $post->replies->last()->user->first_name }}
												@else
													N/A
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>

	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

@stop


@section('custom-js')

<script>
	$(document).ready(function() {

		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		pageSetUp();

		/*
		 * PAGE RELATED SCRIPTS
		 */

		$(".js-status-update a").click(function() {
			var selText = $(this).text();
			var $this = $(this);
			$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
			$this.parents('.dropdown-menu').find('li').removeClass('active');
			$this.parent().addClass('active');
		});

		/*
		* TODO: add a way to add more todo's to list
		*/

		// initialize sortable
		$(function() {
			$("#sortable1, #sortable2").sortable({
				handle : '.handle',
				connectWith : ".todo",
				update : countTasks
			}).disableSelection();
		});

		// check and uncheck
		$('.todo .checkbox > input[type="checkbox"]').click(function() {
			var $this = $(this).parent().parent().parent();

			if ($(this).prop('checked')) {
				$this.addClass("complete");

				// remove this if you want to undo a check list once checked
				//$(this).attr("disabled", true);
				$(this).parent().hide();

				// once clicked - add class, copy to memory then remove and add to sortable3
				$this.slideUp(500, function() {
					$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
					$this.remove();
					countTasks();
				});
			} else {
				// insert undo code here...
			}

		})
		// count tasks
		function countTasks() {

			$('.todo-group-title').each(function() {
				var $this = $(this);
				$this.find(".num-of-tasks").text($this.next().find("li").size());
			});

		}

		/*
		 * VECTOR MAP
		 */

		data_array = {
			"US" : 4977,
			"AU" : 4873,
			"IN" : 3671,
			"BR" : 2476,
			"TR" : 1476,
			"CN" : 146,
			"CA" : 134,
			"BD" : 100
		};

		$('#vector-map').vectorMap({
			map : 'world_mill_en',
			backgroundColor : '#fff',
			regionStyle : {
				initial : {
					fill : '#c4c4c4'
				},
				hover : {
					"fill-opacity" : 1
				}
			},
			series : {
				regions : [{
					values : data_array,
					scale : ['#85a8b6', '#4d7686'],
					normalizeFunction : 'polynomial'
				}]
			},
			onRegionLabelShow : function(e, el, code) {
				if ( typeof data_array[code] == 'undefined') {
					e.preventDefault();
				} else {
					var countrylbl = data_array[code];
					el.html(el.html() + ': ' + countrylbl + ' visits');
				}
			}
		});

		/*
		 * FULL CALENDAR JS
		 */

		if ($("#calendar").length) {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();

			var calendar = $('#calendar').fullCalendar({

				selectable : false,
				selectHelper : true,
				unselectAuto : false,
				disableResizing : true,

				header : {
					left : 'title', //,today
					center : 'prev, next, today',
					right : 'month, agendaWeek, agenDay' //month, agendaDay,
				},

				select : function(start, end, allDay) {
					var title = prompt('Event Title:');
					if (title) {
						calendar.fullCalendar('renderEvent', {
							title : title,
							start : start,
							end : end,
							allDay : allDay
						}, true // make the event "stick"
						);
					}
					calendar.fullCalendar('unselect');
				},

				events : 'calendar',

				eventRender : function(event, element, icon) {
					if (!event.description == "") {
						element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
					}
					if (!event.icon == "") {
						element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
					}
				}
			});

		};

		/* hide default buttons */
		$('.fc-header-right, .fc-header-center').hide();

		// calendar prev
		$('#calendar-buttons #btn-prev').click(function() {
			$('.fc-button-prev').click();
			return false;
		});

		// calendar next
		$('#calendar-buttons #btn-next').click(function() {
			$('.fc-button-next').click();
			return false;
		});

		// calendar today
		$('#calendar-buttons #btn-today').click(function() {
			$('.fc-button-today').click();
			return false;
		});

		// calendar month
		$('#mt').click(function() {
			$('#calendar').fullCalendar('changeView', 'month');
		});

		// calendar agenda week
		$('#ag').click(function() {
			$('#calendar').fullCalendar('changeView', 'agendaWeek');
		});

		// calendar agenda day
		$('#td').click(function() {
			$('#calendar').fullCalendar('changeView', 'agendaDay');
		});

		/*
		 * CHAT
		 */

		$.filter_input = $('#filter-chat-list');
		$.chat_users_container = $('#chat-container > .chat-list-body')
		$.chat_users = $('#chat-users')
		$.chat_list_btn = $('#chat-container > .chat-list-open-close');
		$.chat_body = $('#chat-body');

		/*
		* LIST FILTER (CHAT)
		*/

		// custom css expression for a case-insensitive contains()
		jQuery.expr[':'].Contains = function(a, i, m) {
			return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
		};

		function listFilter(list) {// header is any element, list is an unordered list
			// create and add the filter form to the header

			$.filter_input.change(function() {
				var filter = $(this).val();
				if (filter) {
					// this finds all links in a list that contain the input,
					// and hide the ones not containing the input while showing the ones that do
					$.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
					$.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
				} else {
					$.chat_users.find("li").slideDown();
				}
				return false;
			}).keyup(function() {
				// fire the above change event after every letter
				$(this).change();

			});

		}

		// on dom ready
		listFilter($.chat_users);

		// open chat list
		$.chat_list_btn.click(function() {
			$(this).parent('#chat-container').toggleClass('open');
		})

		$.chat_body.animate({
			scrollTop : $.chat_body[0].scrollHeight
		}, 500);


		$(function() {

			$('#load').on('click', function(e){
				$.ajax({
					type: "GET",
					url: 'chat',
					data: {
						date: $('#chat time').first().text()
					},
					success: function(response){
						$.each(response, function(i, item){
							if(item.user.photo != null){
								image = '/photos/' + item.user.photo;
							}else{
								image = '/img/avatar.png';
							}
							var new_message = '<li class="message">' +
													'<img style="width:50px; height:50px;" src="' + image + '" class="online" alt="">' +
													'<div class="message-text">' +
														'<time>' +
															item.created_at +
														'</time> <a href="javascript:void(0);" class="username">' + item.user.first_name + '</a> ' + item.body + ' ' +
													'</div>' +
												'</li>';
							$('#chat').prepend(new_message);
						});
					}
				});
			});

			function reply(){
				var message = {
					body: $('#textarea-expand').val()
				};

				$.ajax({
					type: "POST",
					url: 'chat',
					data: message
				});
			}

			$('#reply').on('click', function(e){
				if($('#textarea-expand').val() != ''){
					reply();
					$('#textarea-expand').val('');
				}
			});

			
			$('#textarea-expand').keydown(function(e){
				if($('#subscription').is(':checked') && $('#textarea-expand').val() != ''){
					if(e.which == 13){
						reply();
						$('#textarea-expand').val('');
					}
				}
			});


			var pusher = new Pusher('082bab423e2a8be3da2a');
			var chat = pusher.subscribe('chat');
			chat.bind('new_message', function(response){
				$.each(response, function(i, item){
					if(item.user.photo != null){
						image = '/photos/' + item.user.photo;
					}else{
						image = '/img/avatar.png';
					}
					var new_message = '<li class="message">' +
											'<img style="width:50px; height:50px;" src="' + image + '" class="online" alt="">' +
											'<div class="message-text">' +
												'<time>' +
													item.created_at +
												'</time> <a href="javascript:void(0);" class="username">' + item.user.first_name + '</a> ' + item.body + ' ' +
											'</div>' +
										'</li>';
					$('#chat').append(new_message);
					$("#chat-body").animate({scrollTop: $("#chat-body").get(0).scrollHeight}, 900);
				});
			});
		});

		/* chart colors default */
			var $chrt_border_color = "#efefef";
			var $chrt_grid_color = "#DDD"
			var $chrt_main = "#E24913";
			/* red       */
			var $chrt_second = "#6595b4";
			/* blue      */
			var $chrt_third = "#FF9F01";
			/* orange    */
			var $chrt_fourth = "#7e9d3a";
			/* green     */
			var $chrt_fifth = "#BD362F";
			/* dark red  */
			var $chrt_mono = "#000";

		/* sales chart */

		if ($("#saleschart").length) {
			var d = [];
			@foreach($orders as $order)
				d.push([{{ $order->date->timestamp * 1000 }}, {{ $order->total_cost }}]);
			@endforeach
			console.log(d);
			// var d = [[1196463600000, 0], [1196550000000, 0], [1196636400000, 0], [1196722800000, 77], [1196809200000, 3636], [1196895600000, 3575], [1196982000000, 2736], [1197068400000, 1086], [1197154800000, 676], [1197241200000, 1205], [1197327600000, 906], [1197414000000, 710], [1197500400000, 639], [1197586800000, 540], [1197673200000, 435], [1197759600000, 301], [1197846000000, 575], [1197932400000, 481], [1198018800000, 591], [1198105200000, 608], [1198191600000, 459], [1198278000000, 234], [1198364400000, 1352], [1198450800000, 686], [1198537200000, 279], [1198623600000, 449], [1198710000000, 468], [1198796400000, 392], [1198882800000, 282], [1198969200000, 208], [1199055600000, 229], [1199142000000, 177], [1199228400000, 374], [1199314800000, 436], [1199401200000, 404], [1199487600000, 253], [1199574000000, 218], [1199660400000, 476], [1199746800000, 462], [1199833200000, 500], [1199919600000, 700], [1200006000000, 750], [1200092400000, 600], [1200178800000, 500], [1200265200000, 900], [1200351600000, 930], [1200438000000, 1200], [1200524400000, 980], [1200610800000, 950], [1200697200000, 900], [1200783600000, 1000], [1200870000000, 1050], [1200956400000, 1150], [1201042800000, 1100], [1201129200000, 1200], [1201215600000, 1300], [1201302000000, 1700], [1201388400000, 1450], [1201474800000, 1500], [1201561200000, 546], [1201647600000, 614], [1201734000000, 954], [1201820400000, 1700], [1201906800000, 1800], [1201993200000, 1900], [1202079600000, 2000], [1202166000000, 2100], [1202252400000, 2200], [1202338800000, 2300], [1202425200000, 2400], [1202511600000, 2550], [1202598000000, 2600], [1202684400000, 2500], [1202770800000, 2700], [1202857200000, 2750], [1202943600000, 2800], [1203030000000, 3245], [1203116400000, 3345], [1203202800000, 3000], [1203289200000, 3200], [1203375600000, 3300], [1203462000000, 3400], [1203548400000, 3600], [1203634800000, 3700], [1203721200000, 3800], [1203807600000, 4000], [1203894000000, 4500]];

			for (var i = 0; i < d.length; ++i)
				d[i][0] += 60 * 60 * 1000;

			function weekendAreas(axes) {
				var markings = [];
				var d = new Date(axes.xaxis.min);
				// go to the first Saturday
				d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
				d.setUTCSeconds(0);
				d.setUTCMinutes(0);
				d.setUTCHours(0);
				var i = d.getTime();
				do {
					// when we don't set yaxis, the rectangle automatically
					// extends to infinity upwards and downwards
					markings.push({
						xaxis : {
							from : i,
							to : i + 2 * 24 * 60 * 60 * 1000
						}
					});
					i += 7 * 24 * 60 * 60 * 1000;
				} while (i < axes.xaxis.max);

				return markings;
			}

			var options = {
				xaxis : {
					mode : "time",
					tickLength : 5
				},
				series : {
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.15
							}]
						}
					},
					//points: { show: true },
					shadowSize : 0
				},
				selection : {
					mode : "x"
				},
				grid : {
					hoverable : true,
					clickable : true,
					tickColor : $chrt_border_color,
					borderWidth : 0,
					borderColor : $chrt_border_color,
				},
				tooltip : true,
				tooltipOpts : {
					content : "Your costs for <b>%x</b> was <span>$%y</span>",
					dateFormat : "%y-%m-%d",
					defaultTheme : false
				},
				colors : [$chrt_second],

			};

			var plot = $.plot($("#saleschart"), [d], options);
		};

		/* end sales chart */


		L.mapbox.accessToken = 'pk.eyJ1Ijoicm9oYW4wNzkzIiwiYSI6IjhFeGVzVzgifQ.MQBzoHJmjH19bXDW0b8nKQ';
		var map = L.mapbox.map('map', 'inclanfunk.l4mg4b99', {
			zoomControl: false
		}).setView([-39.67, -69.26], 4);

		map.on('click', function(e){

    		plotFarm();

    		$('div#infoTab').empty();
    		
		});

		var farmGeoJson = "{{ Sentry::getUser()->manager->farm->geojson }}";

		var farmLayer = L.mapbox.featureLayer().addTo(map);
		var pivotsLayer = L.mapbox.featureLayer().addTo(map);
		var waterpumpsLayer = L.mapbox.featureLayer().addTo(map);

		var farm_id = {{ Sentry::getUser()->manager->farm->id }};

		plotFarm();
		plotPivots(farm_id);
		plotWaterpumps(farm_id);

		function plotFarm(){
			$.getJSON('/geojson/' + farmGeoJson, function(data){
				var featureLayer = L.mapbox.featureLayer().addTo(farmLayer);
				featureLayer.setGeoJSON(data);
				map.fitBounds(featureLayer.getBounds());
				featureLayer.clearLayers();
			});
		}

		function plotPivots(farm_id){
			$.getJSON('farm/' + farm_id + '/pivots', function(data){
				$.each(data, function(pivot_i, pivot_item){
					if(pivot_item.lat != ''){
						var circle = L.circle([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], parseFloat(pivot_item.radius)).addTo(pivotsLayer);
						var marker = L.marker([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], {
							icon: L.mapbox.marker.icon({
						        'marker-symbol': 'circle-stroked',
						        'marker-color': '#74DF00'
						    })
						}).addTo(pivotsLayer);

						marker.on('click', function(e){
							map.setView(e.latlng, 13);

							$('div#infoTab').html('<div class="col-sm-4"><h3><u>Pivot Info</u></h3><ul><li>Name: ' 
													+ pivot_item.name 
													+ '</li><li>Area: ' 
													+ pivot_item.area 
													+ '</li><li>Sheet: ' 
													+ pivot_item.s_sheet 
													+ '</li><li>Cost: ' 	
													+ pivot_item.cost 
													+ '</li></ul><br /></div>');
						});
					}
				});
			});
		}

		function plotWaterpumps(farm_id){
			$.getJSON('farm/' + farm_id + '/waterpumps', function(data){
				$.each(data, function(pivot_i, pivot_item){
					if(pivot_item.lat != ''){
						var marker = L.marker([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)]).addTo(waterpumpsLayer);
						
						marker.on('click', function(e){
							map.setView(e.latlng, 13);

							$('div#infoTab').html('<div class="col-sm-4"><h3><u>Waterpump Info</u></h3><ul><li>Name: ' 
													+ pivot_item.name 
													+ '</li><li>Brand: ' 
													+ pivot_item.g_brand 
													+ '</li><li>Type: ' 
													+ pivot_item.g_type 
													+ '</li><li>Power: ' 	
													+ pivot_item.g_power
													+ '</li></ul><br /></div>');
						});
					}
				});
			});
		}

		$('div#pivotTab').tabs();
		$('div#waterpumpTab').tabs();

		$('div#pivotTab').addClass('hidden');
		$('div#waterpumpTab').addClass('hidden');

	});

</script>

@stop