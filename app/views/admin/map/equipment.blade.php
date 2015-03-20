@extends('layouts.master')


@section('content')

<style>
	body {
		margin: 0;
		padding: 0; 
	}
	#map {
		position: relative;
		top: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
	}
	div.widget-body.no-padding {
		height: 500px;
	}

	/*#waterpumpTab {
		margin: 10px;
	    font-size: 11px;
	    line-height: 18px;
	    border-radius: 2px;
	}*/

	#waterpumpTab ul{
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}

	/*#pivotTab{
		margin: 10px;
	    font-size: 11px;
	    line-height: 18px;
	    border-radius: 2px;
	}*/

	#pivotTab ul{
		list-style-type: none;
		padding: 0px;
		margin: 0px;
	}

</style>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-white" id="wid-id-0" data-widget-fullscreenbutton="true" data-widget-editbutton="false" data-widget-deletebutton="false">
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
					<h2>Equipment Map</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div id='map'></div>

						<div id="pivotTab" class="col-xs-6 col-md-4 hidden">
							<ul>
								<li>
									<a href="#tabs-a">Pivot</a>
								</li>
								<li>
									<a href="#tabs-b">Settings</a>
								</li>
								<li>
									<a href="#tabs-c">Electircal Board</a>
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
						<div id="waterpumpTab" class="col-xs-10 col-md-4 hidden">
							<ul>
								<li>
									<a href="#tabs-a">Waterpump</a>
								</li>
								<li>
									<a href="#tabs-b">Settings</a>
								</li>
								<li>
									<a href="#tabs-c">Electircal Board</a>
								</li>
								<li>
									<a href="#tabs-d">Deep Well Info</a>
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
		<!-- WIDGET END -->

	</div>

	<!-- end row -->
</section>

@stop

@section('custom-js')

	<script type="text/javascript">
		L.mapbox.accessToken = 'pk.eyJ1Ijoicm9oYW4wNzkzIiwiYSI6IjhFeGVzVzgifQ.MQBzoHJmjH19bXDW0b8nKQ';
		var map = L.mapbox.map('map', 'inclanfunk.l4mg4b99', {
			zoomControl: false
		}).setView([-39.67, -69.26], 4);

		$(document).ready(function(){
		    $('header h2').text('Equipment Map');
		    $('#pivotTab').tabs();
		    $('#waterpumpTab').tabs();

		    plotDistributorCompanies();

		    map.on('click', function(e){
				map.setView([-39.67, -69.26], 4);
				removeFarmsLayers();
				removePivotsLayer();
				removeWaterpumpsLayer();
				map.addLayer(distributorCompaniesLayer);
				map.addLayer(farmsLayer);
				map.addLayer(pivotsLayer);
				map.addLayer(waterpumpsLayer);
				plotDistributorCompanies();
				$('#pivotTab').addClass('hidden');
				$('#waterpumpTab').addClass('hidden');
			});

		    var distributorCompanies = false;
			var distributorCompaniesLayer = L.layerGroup().addTo(map);
			var farmsLayer = L.layerGroup().addTo(map);

			var pivotsLayer = L.mapbox.featureLayer().addTo(map);
			var waterpumpsLayer = L.mapbox.featureLayer().addTo(map);

			function removeDistributorCompaniesLayers(){
				distributorCompaniesLayer.clearLayers();
				map.removeLayer(distributorCompaniesLayer);
			}

			function removeFarmsLayers(){
				farmsLayer.clearLayers();
				map.removeLayer(farmsLayer);
			}

			function removePivotsLayer(){
				pivotsLayer.clearLayers();
				map.removeLayer(pivotsLayer);
			}

			function removeWaterpumpsLayer(){
				waterpumpsLayer.clearLayers();
				map.removeLayer(waterpumpsLayer);
			}

			function plotDistributorCompanies(){
				if(!distributorCompanies){
					$.getJSON('distributor-companies', function (data) {
						distributorCompanies = true;
					    $.each(data, function (i, item) {
					        if (item.geojson != '') {
					            var featureLayer = L.mapbox.featureLayer().addTo(distributorCompaniesLayer);
					            $.getJSON('/geojson/' + item.geojson, function (data) {
					                featureLayer.setGeoJSON(data);
					                featureLayer.eachLayer(function (layer) {
					                    layer.on('click', function (e) {
					                        map.fitBounds(featureLayer.getBounds());
					                        removeDistributorCompaniesLayers();
					                        plotFarms(item.id);
					                        distributorCompanies = false;
					                    });
					                });
					            });
					        }
					    });
					});
				}
			}

			function plotFarms(distributor_id){
				$.getJSON('distributor/' + distributor_id + '/farms', function(data){
                	$.each(data, function(farm_i, farm_item){
                		if(farm_item.geojson != ''){
                			var featureLayer = L.mapbox.featureLayer().addTo(farmsLayer);
                			$.getJSON('/geojson/' + farm_item.geojson, function(data){
                				featureLayer.setGeoJSON(data);
                				featureLayer.eachLayer(function (layer) {
				                    layer.on('click', function (e) {
				                        map.fitBounds(featureLayer.getBounds());
				                        removeFarmsLayers();
				                        plotPivots(farm_item.id);
				                        plotWaterpumps(farm_item.id);
				                    });
				                });
                			});
                		}
                	});
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
							$('#pivotGeneral').empty()
							$('#pivotSettings').empty()
							$('#pivotEbSettings').empty()

							for (var key in pivot_item) {
								var current = key.split('_');
								if(current[0] == 'g'){
									current = current.slice(1);
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
									console.log(current);
									$('#pivotSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
								}
								if(current[0] == 'eb'){
									current = current.slice(1);
									$.each(current, function(i, item){
										current[i] = item.charAt(0).toUpperCase() + item.slice(1);
									});
									console.log(current);
									$('#pivotEbSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
								}
							}

							marker.on('click', function(e){
								$('#pivotTab').removeClass('hidden');
								$('#waterpumpTab').addClass('hidden');
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
							$('#waterpumpGeneral').empty()
							$('#waterpumpSettings').empty()
							$('#waterpumpEbSettings').empty()
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
									console.log(current);
									$('#waterpumpSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
								}
								if(current[0] == 'eb'){
									current = current.slice(1);
									$.each(current, function(i, item){
										current[i] = item.charAt(0).toUpperCase() + item.slice(1);
									});
									console.log(current);
									$('#waterpumpEbSettings').append("<li>" + current.join(' ') + ': ' + pivot_item[key] + "</li>");
								}
							}
							$('#waterpumpDwInfo').empty()
									.append('<li>Download Info: <a href="/deepwell/' + pivot_item.deepwell_info + '">Download</a></li>')
							marker.on('click', function(e){
								$('#waterpumpTab').removeClass('hidden');
								$('#pivotTab').addClass('hidden');
							});
						}
					});
				});
			}

			    
		});
	</script>

@stop