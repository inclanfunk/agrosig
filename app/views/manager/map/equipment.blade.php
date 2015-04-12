@extends('layouts.master')


@section('content')

<style>
	#map{
		width: 100%;
		height: 500px;
	}

	article#wrapper{
		position: relative;
	}

	div#wid-id-1{
		position: absolute;
		top: 55px;
		right: 20px;
		z-index: 99;
	}

	div#wid-id-2{
		position: absolute;
		top: 55px;
		right: 20px;
		z-index: 99;
	}

	#pivotTab ul{
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}

	#waterpumpTab ul{
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}

	ul#waterpumpGeneral > li:before,
	ul#pivotGeneral > li:before{
		font-family: 'FontAwesome';
		content: '\f01a';
		margin:0 10px 0 0;
	}

	ul#waterpumpEbSettings > li:before,
	ul#pivotEbSettings > li:before{
		font-family: 'FontAwesome';
		content: '\f0e7';
		margin:0 10px 0 0;
	}

	ul#waterpumpSettings > li:before,
	ul#pivotSettings> li:before{
		font-family: 'FontAwesome';
		content: '\f013';
		margin:0 10px 0 0;
	}

	ul#waterpumpDwInfo > li:before{
		font-family: 'FontAwesome';
		content: '\f01b';
		margin:0 10px 0 0;
	}

</style>

<section id="widget-grid" class="">
	<div class="row">

		<article id="wrapper" class="col-xs-12">
			<div id="map"></div>
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget col-xs-6 col-md-5 hidden" id="wid-id-1" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
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
					<h2><strong>Default</strong> <i>Widget</i></h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						<input class="form-control" type="text">
						<span class="note"><i class="fa fa-check text-success"></i> Change title to update and save instantly!</span>
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body">
						<div class="custom-scroll table-responsive" style="height:290px; overflow-y: scroll;">
						
							<div id="pivotTab">
								<ul>
									<li>
										<a href="#tabs-a">
											<i class="fa fa-lg fa-arrow-circle-o-down"></i>
											<span class="hidden-mobile hidden-tablet">
												Pivot
											</span>
										</a>
									</li>
									<li>
										<a href="#tabs-b">
											<i class="fa fa-lg fa-gear"></i>
											<span class="hidden-mobile hidden-tablet">
												Settings
											</span>
										</a>
									</li>
									<li>
										<a href="#tabs-c">
											<i class="fa fa-lg fa-bolt"></i>
											<span class="hidden-mobile hidden-tablet">
												Electrical Board
											</span>
										</a>
									</li>
								</ul>
								<div id="tabs-a">
									<ul id="pivotGeneral">
										
									</ul>
								</div>
								<div id="tabs-b">
									<ul id="pivotSettings">
										
									</ul>
								</div>
								<div id="tabs-c">
									<ul id="pivotEbSettings">
										
									</ul>
								</div>
							</div>
						</div>
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

			<div id="map"></div>

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget col-xs-6 col-md-5 hidden" id="wid-id-2" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false">
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
					<h2><strong>Default</strong> <i>Widget</i></h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body">
						
						<div id="waterpumpTab">
							<ul>
								<li>
									<a href="#tabs-a">
										<i class="fa fa-lg fa-arrow-circle-o-down"></i>
										<span class="hidden-mobile hidden-tablet">
											Waterpump
										</span>
									</a>
								</li>
								<li>
									<a href="#tabs-b">
										<i class="fa fa-lg fa-gear"></i>
										<span class="hidden-mobile hidden-tablet">
											Settings
										</span>
									</a>
								</li>
								<li>
									<a href="#tabs-c">
										<i class="fa fa-lg fa-bolt"></i>
										<span class="hidden-mobile hidden-tablet">
											Electrical Board
										</span>
									</a>
								</li>
								<li>
									<a href="#tabs-d">
										<i class="fa fa-lg fa-arrow-circle-o-up"></i>
										<span class="hidden-mobile hidden-tablet">
											Deep Well
										</span>
									</a>
								</li>
							</ul>
							<div id="tabs-a">
								<ul id="waterpumpGeneral">
									
								</ul>
							</div>
							<div id="tabs-b">
								<ul id="waterpumpSettings">
									
								</ul>
							</div>
							<div id="tabs-c">
								<ul id="waterpumpEbSettings">
									
								</ul>
							</div>
							<div id="tabs-d">
								<ul id="waterpumpDwInfo">
									
								</ul>
							</div>
						</div>
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

		</article>



	</div>
</section>

@stop

@section('custom-js')

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
			// PAGE RELATED SCRIPTS
		
			// switch style change
			$('input[name="checkbox-style"]').change(function() {
				//alert($(this).val())
				$this = $(this);
		
				if ($this.attr('value') === "switch-1") {
					$("#switch-1").show();
					$("#switch-2").hide();
				} else if ($this.attr('value') === "switch-2") {
					$("#switch-1").hide();
					$("#switch-2").show();
				}
		
			}); 
			
			// tab - pills toggle
			$('#show-tabs').click(function() {
				$this = $(this);
				if($this.prop('checked')){
					$("#widget-tab-1").removeClass("nav-pills").addClass("nav-tabs");
				} else {
					$("#widget-tab-1").removeClass("nav-tabs").addClass("nav-pills");
				}
				
			});			
		
		});

		</script>

	<script type="text/javascript">
		L.mapbox.accessToken = 'pk.eyJ1Ijoicm9oYW4wNzkzIiwiYSI6IjhFeGVzVzgifQ.MQBzoHJmjH19bXDW0b8nKQ';
		var map = L.mapbox.map('map', 'inclanfunk.l4mg4b99', {zoomControl: true}).setView([-39.67, -69.26], 4);

		var layers = {
      		Satellite: L.mapbox.tileLayer('inclanfunk.ln85p8ch'),
		Outdoors: L.mapbox.tileLayer('inclanfunk.ln86dg58')
  		};
	
  		layers.Satellite.addTo(map);
  		L.control.layers(layers).addTo(map);

		$(document).ready(function(){
			$('#wid-id-1 h2').text('Pivot Data');
			$('#wid-id-2 h2').text('Waterpump Data');
		    $('#pivotTab').tabs();
		    $('#waterpumpTab').tabs();

		    map.on('click', function(e){

	    		$('#wid-id-1').addClass('hidden');
	    		$('#wid-id-2').addClass('hidden');

	    		plotFarm();
	    		
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

								map.setView(e.latlng, 14);

								
								$('#wid-id-1').removeClass('hidden');
								$('#wid-id-2').addClass('hidden');


								$('#pivotGeneral').empty();
								$('#pivotSettings').empty();
								$('#pivotEbSettings').empty();

								$('div#wid-id-1 header h2').text(pivot_item.name);

								for (var key in pivot_item) {
									var current = key.split('_');
									if(current[0] == 'g'){
										if(current[1] == 'quantity'){
											current = current.slice(4);
											current.unshift('QOA');
										}else{
											current = current.slice(1);
										}
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#pivotGeneral').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
									if(current[0] == 's'){
										current = current.slice(1);
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#pivotSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
									if(current[0] == 'eb'){
										current = current.slice(1);
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#pivotEbSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
								}


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

								map.setView(e.latlng, 15);

								$('#wid-id-2').removeClass('hidden');
								$('#wid-id-1').addClass('hidden');

								$('#waterpumpGeneral').empty();
								$('#waterpumpSettings').empty();
								$('#waterpumpEbSettings').empty();

								$('div#wid-id-2 header h2').text(pivot_item.name);

								for (var key in pivot_item) {
									var current = key.split('_');
									if(current[0] == 'g'){
										current = current.slice(1);
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#waterpumpGeneral').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
									if(current[0] == 's'){
										current = current.slice(1);
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#waterpumpSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
									if(current[0] == 'eb'){
										current = current.slice(1);
										$.each(current, function(i, item){
											current[i] = item.charAt(0).toUpperCase() + item.slice(1);
										});
										$('#waterpumpEbSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
									}
								}
								$('#waterpumpDwInfo').empty()
										.append('<li>Download Info: <a href="/deepwell/' + pivot_item.deepwell_info + '">Download</a></li>');


							});
						}
					});
				});
			}

			    
		});
	</script>

@stop