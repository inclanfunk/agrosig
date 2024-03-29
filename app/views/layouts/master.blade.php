<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<title> {{ trans('master.SigAgroAdmin') }}</title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('css/fontawesome-iconpicker.min.css')}}">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/smartadmin-skins.min.css') }}">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to('css/smartadmin-rtl.min.css') }}">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css"> -->

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="{{ URL::to('img/favicon/favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('img/favicon/favicon.ico') }}" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="{{ URL::to('img/splash/sptouch-icon-iphone.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('img/splash/touch-icon-ipad.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ URL::to('img/splash/touch-icon-iphone-retina.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ URL::to('img/splash/touch-icon-ipad-retina.png') }}">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="{{ URL::to('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="{{ URL::to('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{ URL::to('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">

		<!-- Mapbox -->
		<link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />

	</head>
	<body class="">
		<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

		<!-- HEADER -->
		 @include('layouts.header')
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->


        <!-- SIDE BAR LEFT PANEL -->

        @include('layouts.sidebar')


		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			@include('layouts.ribbon')
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">
                    @yield('content')
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
            @include('layouts.footer')
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->

		<div id="shortcut">
			<ul>
				<li>
					<a href="{{ URL::to('profile') }}" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>{{ trans('master.MyProfile') }} </span> </span> </a>
				</li>

				<li>
					<a href="{{ URL::to('calendar') }}" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>{{ trans('master.Calendar') }} </span> </span> </a>
				</li>
				<!--
				<li>
					<a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				-->
				<!--
				<li>
					<a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>{{ trans('master.Maps') }} </span> </span> </a>
				</li>
				-->

				<!--
				<li>
					<a href="#invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				-->
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": false }' src="{{ URL::to('js/plugin/pace/pace.min.js') }}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{ URL::to('js/libs/jquery-2.1.1.min.js') }}"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="{{ URL::to('js/libs/jquery-ui-1.10.3.min.js') }}"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ URL::to('js/app.config.js') }}"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{ URL::to('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ URL::to('js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ URL::to('js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ URL::to('js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ URL::to('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ URL::to('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ URL::to('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ URL::to('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ URL::to('js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ URL::to('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ URL::to('js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ URL::to('js/plugin/fastclick/fastclick.min.js') }}"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<!-- <script src="js/demo.min.js"></script> -->

		<!-- MAIN APP JS FILE -->
		<script src="{{ URL::to('js/app.min.js') }}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{ URL::to('js/speech/voicecommand.min.js') }}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{ URL::to('js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
		<script src="{{ URL::to('js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="{{ URL::to('js/plugin/flot/jquery.flot.cust.min.js') }}"></script>
		<script src="{{ URL::to('js/plugin/flot/jquery.flot.resize.min.js') }}"></script>
		<script src="{{ URL::to('js/plugin/flot/jquery.flot.time.min.js') }}"></script>
		<script src="{{ URL::to('js/plugin/flot/jquery.flot.tooltip.min.js') }}"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="{{ URL::to('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
		<script src="{{ URL::to('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
		
		<!-- Full Calendar -->
		<script src="{{ URL::to('js/plugin/moment/moment.min.js') }}"></script>
		<script src="{{ URL::to('js/plugin/fullcalendar/jquery.fullcalendar.min.js') }}"></script>

		<!-- Pusher -->
		<script src="//js.pusher.com/2.2/pusher.min.js"></script>

		<!-- Mapbox-->
		<script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>

		<script type="text/javascript">

			$(document).ready(function(){
				$('ul.dropdown-menu li').each(function(i){
					if($(this).hasClass('active')){
						$('a#selectedLocale span').text($(this).text());

						$('a#selectedLocale > img')
							.removeClass()
							.addClass($(this).find('img').attr('class'));
					}
				});

				$(function() {

					var pusher = new Pusher('082bab423e2a8be3da2a');
					var chat = pusher.subscribe('notifications');
					chat.bind('forum_notification', function(response){

						var logged_in_user_id = null;

						$.ajax({
							type: "GET",
							url: '/myProfile',
							success: function(response){
								logged_in_user_id = response.id;
							}
						}).then(function(){
							if(logged_in_user_id == response.user_id){
								var count = parseInt($('span#forum-count').text());
								$('span#forum-count').text(count+1);

								var count = parseInt($('b.badge').text());
								$('b.badge').text(count+1);
								$('b.badge').addClass('bg-color-red');

								if($('ul#forum').length){
									var new_notification = $('ul#forum li').last();
									new_notification.find('span#whole').addClass('unread');
									new_notification.find('span#body').html(response.body);
									new_notification.find('span#body')
									.append('<br /><span id="time" class="pull-right font-xs text-muted"><i>' + response.human_time + '</i></span>');
									$('ul#forum').prepend(new_notification);
								}
							}
						});
					});

				});
			});

		</script>

        @yield('custom-js')

	</body>

</html>