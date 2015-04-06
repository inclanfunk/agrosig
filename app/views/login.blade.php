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

    <!--	<span id="extr-page-header-space"> <span class="hidden-mobile">Need an account?</span> <a href="register.html" class="btn btn-danger">Create account</a> </span> -->
</header>

<div id="main" role="main" style="padding-top: 0px;">

	<!-- MAIN CONTENT -->
<div class="img-intro-background">
	<div id="content" class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
				<!--<h1 class="login-header-big sigagroColorOrange">Web App</h1>-->
				<div class="hero">

					<div class="pull-left login-desc-box-l">
						<h1 class="paragraph-header-sigagro sigagroColorBlanc">La plataforma web de la comunidad Agropecuaria de riego<!--Disfrute de la experiencia Sig Agro para operar su campo.--></h4>


					<!--
						<div class="login-app-icons">
							<a href="" class="btn sigagroColorVert80 btn-sm">Beneficios</a>
							<a href="http://www.sigagro.com.ar" target="_blank" class="btn sigagroColorOrange80 btn-sm">Find out more</a>
						</div>
					
					-->
					</div>
					<!--
					<img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">
					-->
				</div>
				<!--
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	                
						<h5 class="about-heading">Con Sig Agro podrá</h5>
						
						<ul class="list-group">
						<li class="list-group-item loginPodra sigagroColorOrange80">Consultar un mapa de los equipos geo-localizados</li>
						<li class="list-group-item loginPodra sigagroColorVert80">Ver el costo de mantenimiento por pivote o bomba</li>
						<li class="list-group-item loginPodra sigagroColorBleu80">Organizar sus tareas de campo con el calendario</li>
						<li class="list-group-item loginPodra sigagroColorOrange80">Chatear con los usuarios del sistema</li>
						<li class="list-group-item loginPodra sigagroColorVert80">Chatear con los servicios técnicos de los proveedores</li>
						<li class="list-group-item loginPodra sigagroColorBleu80">Participar del foro y compartir experiencias</li>
						<li class="list-group-item loginPodra sigagroColorOrange80">Estudiar el precio de los commodities en gráficos</li>
						</ul>
						
							
					                  
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    
						<h5 class="about-heading">Registrense ahora: un año de actualización gratis!</h5>
						<p>
							
						</p>
                   
					</div>
					
				</div>
				-->
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

    <section class="container content-section text-left">
		
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
	
	<section id="about2" class="container content-section text-center" style="padding-top:0px">
		
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
	
	<section id="contacto" class="container content-section-footer-sigagro text-center sigagroColorOrange80">
	<hr>
        <div class="container">    
		  <div class="row sigagroColorOrange">
			<div class="col-lg-12">
			  <div class="col-md-3">
				<ul class="list-unstyled">
				  <li class="sigagroColorRouge">Nuestra Direcci&oacute;n:<li>
				  <li>Lynx Monitoreo</li>
				  <li>Las Chacras Norte</li>
				  <li>X58885 Villa de Las Rosas</li>
				  <li>Provincia de C&oacute;rdoba</li>
				  <li>Argentina</li>
				</ul>
			  </div>
			  <div class="col-md-3">
				<ul class="list-unstyled">
				  <li class="sigagroColorRouge">Aplicaciones<li>
				  <li>Sistema de Informaci&oacute;n Geogr&agrave;fico</li>
				  <li>Geo-Localizaci&oacute;n de personas y vehículos (Seguimiento Satelital)</li>              
				</ul>
			  </div>
			  <div class="col-md-3">
				<ul class="list-unstyled">
				  <li class="sigagroColorRouge">Servicios<li>
				  <li>Fotograf&igrave;a a&eacute;rea</li>
				  <li>Diseño y Arquitectura de Software</li>             
				</ul>
			  </div>
			  <div class="col-md-3">
				<ul class="list-unstyled ">
				  <li class="sigagroColorRouge">Contactos<li>
				  <li><u>Julien Baudet</u></li>
				  <li><span class="glyphicon glyphicon-phone"></span> 03544 15 532750</li>
				  <li><span class="glyphicon glyphicon-envelope"></span> julien.baudet@gmail.com</li>   
					<li><u>Victor Hugo Teyssedou</u></li>
				  <li><span class="glyphicon glyphicon-phone"></span> 03544 612333</li>
				  <li><span class="glyphicon glyphicon-envelope"></span> tecnoriego.valley@gmail.com</li> 
				</ul>
			  </div>  
			</div>
		  </div>
		  
		  <div class="row">
			<div class="col-lg-12">
				</br>
				</br>
				<p class="muted" style="font-size:14px; text-align:right;">&copy; 2015 Sig Agro: Proyecto de Victor Hugo Teyssedou y Julien Baudet. Todos derechos reservados</p>
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