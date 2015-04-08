<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
	<meta charset="utf-8">
	<title>Sig Agro | Login</title>
	<meta name="description" content="La plataforma en la nube de la comunidad Agropecuaria de riego">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- #CSS Links -->
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen"  href="{{URL::to('css/bootstrap.min.css')}} ">
	<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('css/font-awesome.min.css')}} ">

	<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('css/smartadmin-production.min.css')}} ">
	<link rel="stylesheet" type="text/css" media="screen" href="{{URL::to('css/smartadmin-skins.min.css')}}   ">

	<!-- SmartAdmin RTL Support is under construction
		 This RTL CSS will be released in version 1.5
	<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/sigagro_style.css">
	<link href="css/grayscale.css" rel="stylesheet">	
	<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
	<link rel="stylesheet" type="text/css" media="screen" href=" {{URL::to('css/demo.min.css')}}   ">

	<!-- #FAVICONS -->
	<link rel="shortcut icon" href=" {{URL::to('img/favicon/favicon.ico')}}    " type="image/x-icon">
	<link rel="icon" href=" {{URL::to('img/favicon/favicon.ico')}} " type="image/x-icon">

	<!-- #GOOGLE FONT -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	<!-- #APP SCREEN / ICONS -->
	<!-- Specifying a Webpage Icon for Web Clip
		 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
	<link rel="apple-touch-icon" href="{{URL::to('img/splash/sptouch-icon-iphone.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('img/splash/touch-icon-ipad.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{URL::to('img/splash/touch-icon-iphone-retina.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{URL::to('img/splash/touch-icon-ipad-retina.png')}} ">

	<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="{{URL::to('img/splash/ipad-landscape.png')}} " media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="{{URL::to('img/splash/ipad-portrait.png')}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="{{URL::to('img/splash/iphone.png')}} " media="screen and (max-device-width: 320px)">

</head>

<body class="animated fadeInDown">

<header id="header" style="height:40px;">
	<div id="logo-group">
		<span id="logo" style="margin-top:5px"> <img src="{{URL::to('img/logo.png')}}" alt="Sig Agro"> </span>
	</div>
</header>

<div id="main" role="main" style="padding-top:0px";>

	<!-- MAIN CONTENT -->
	<div class="img-intro-background">
		<div id="content" class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
					<div class="hero">
						<div class="pull-left login-desc-box-l">
						<h1 class="paragraph-header-sigagro sigagroColorBlanc">La plataforma web de la comunidad Agropecuaria de riego</h1>
						</div>
					</div>
				</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
			
			
				<div class="well no-padding">
					<form action="{{ URL::to('/') }}" method="post" id="login-form" class="smart-form client-form">
						<header class="sigagroColorBleu80">
							Area Cliente
						</header>

						<fieldset>

							<section>
								<label class="label">E-mail</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="email">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Ingrese su dirección de mail</b></label>
							</section>

							<section>

								<label class="label">Contraseña</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su contraseña</b> </label>
							
								<div class="note">
									<a href="{{URL::to('/password/remind')}}">Olvido su contraseña?</a>
								</div>

							</section>

                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" >
									<i></i>Permanecer conectado</label>
							</section>



						</fieldset>
						<footer>
							<button type="submit" class="btn sigagroColorBleu80">
								Entrar
							</button>
						</footer>
					</form>

                    @if(Session::has('message'))
        				<p class="alert alert-danger">{{Session::get('message')}}</p>
                    @endif

				</div>


			</div>
			</div>
		</div>
	</div>


    <section class="container content-section text-center container-sigagro">
		
	<div class="row destacados">
		<div class="col-md-4">
    		<div>
				<img src="img/chat.jpg" alt="Chat en vivo" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">Chat Campo</h2>
				<p>Encontrate en el "Chat Campo", para intercambiar ideas y proyectos o despejar dudas con los miembros de la comunidad y los servicios técnicos de los proveedores.</p>
				<!--
				<ul style="list-style-type: none;margin:0;padding:0">
				<li class="page-scroll">
				<a href="#que" class="btn btn-primary" title="Enlace">Leer m&aacute;s &rsaquo;&rsaquo;</a>
				</li>
				</ul>
				-->
			</div>
		</div>
		
		<div class="col-md-4">
			<div>
				<img src="img/forum.jpg" alt="Republica Argentina" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">Foro Agro</h2>
				<p>Participa del "Foro Agro" en las temáticas de tu interés, ej: compra-venta de material, guía y consejo sobre proveedores, experiencias en el campo, opinión sobre servicios y productos.</p>
			</div>
		</div>

		<div class="col-md-4">
			<div>
				<img src="img/agenda.jpg" alt="Agenda" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">Multi-Agenda</h2>
				<p>Utiliza la "Multi-Agenda"; Una Agenda Pública para estar al día de los eventos del sector y una Agenda Personal para la gestión de tus tareas programadas y/o recordatorios.</p>
			</div>
		</div>
	</div>
	</section>
	
	<section class="container content-section text-center container-sigagro">
		
	<div class="row destacados">
	
		<div class="col-md-4">
			<div>
				<img src="img/sir.jpg" alt="Seguimiento Riego" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">S.I.R.</h2>
				<p>Seguí tus Instalaciones de Riego en directo. Consulta todos los reglajes de los equipos, los históricos de intervención, de mantenimiento (ej: piezas instaladas, cambiadas, costos correspondientes)</p>
			</div>
		</div>
		
		<div class="col-md-4">
			<div>
				<img src="img/asesor.jpg" alt="Republica Argentina" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">Agro Asesor</h2>
				<p>Subí periódicamente la información de tus lotes a través de SIG Agro y recibí un informe detallado con gráficos y prescripciones.</p>
			</div>
		</div>
		
		<div class="col-md-4">
			<div>
				<img src="img/fotogrametria.jpg" alt="Republica Argentina" class="img-circle img-thumbnail" style="border-radius:5%">
				<h2 class="sigagroColorOrange">Fotogrametría</h2>
				<p>Mejora tu rentabilidad ya! Contratando nuestro servicio de fotografía aérea de alta resolución a un costo bonificado. Dispone en tu cuenta SIG Agro de los mapas temáticos: Indices de verde (NDVI, NDWI, DVI, SAVI), Limites precisos de lotes, Modelo de Elevación Digital para mejorar el riego, Detección de plagas.</p>
			</div>
		</div>
		
	</div>
	</section>
	
	<section class="container content-section text-center container-sigagro img-intro-background2 hidden-xs hidden-sm">
	<div class="col-md-7 col-md-offset-3">
	<h1 class="paragraph-header-sigagro2 sigagroColorBlanc">Experimente la simplicidad de Sig Agro para operar su campo!</h1>
	</div>
	</section>
	
	<section class="container content-section-footer-sigagro text-left">
	<hr>
        <div class="container">    
		  <div class="row">
		  Sig Agro nace de un encuentro entre <span class="sigagroColorRouge">Victor Hugo Teyssedou</span>, especialista en instalaciones de sistemas de riego de precisión
		  y <span class="sigagroColorRouge">Julien Baudet</span> analista en sistema de información geográficos.
		  Juntos, hemos diseñado un sistema integral para operar su campo y mejorar su rentabilidad.
		  </br>
		  </br>
		  Ventas y Prensa: Hugo <span class="glyphicon glyphicon-phone sigagroColorRouge"></span>: 03544 612333 | <span class="glyphicon glyphicon-envelope sigagroColorRouge"></span>: tecnoriego.valley@gmail.com
		  </br>
		  Soporte técnico: Julien <span class="glyphicon glyphicon-phone sigagroColorRouge"></span>: 03544 15 532750 | <span class="glyphicon glyphicon-envelope sigagroColorRouge"></span>: julien.baudet@gmail.com
		  </br>
		  			  
		  <div class="row">
			<div class="col-lg-12">
				</br>
				</br>
				<p class="muted" style="font-size:14px; text-align:right;">&copy; 2015 Sig Agro: Proyecto de Victor Hugo Teyssedou y Julien Baudet. Todos derechos reservados</p>
			</div>
		  </div>
		 </div>
		</div>

    </section>
	
</div>


<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
<script src="{{URL::to('img/splash/touch-icon-ipad.png')}} js/plugin/pace/pace.min.js"></script>
-->

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
<script src="{{URL::to('js/bootstrap/bootstrap.min.js')}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{URL::to('js/plugin/jquery-validate/jquery.validate.min.js')}} "></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{URL::to('js/plugin/masked-input/jquery.maskedinput.min.js')}} "></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->


</body>
</html>