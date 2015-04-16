@extends('layouts.master')


@section('content')

<style>
	#map{
		width: 100%;
		height: 500px;
	}
</style>

<section id="widget-grid" class="">
	<div class="row">

		<article id="wrapper" class="col-xs-12">
			<div id="map"></div>
		</article>

	</div>
</section>

@stop

@section('custom-js')

		<script type="text/javascript" src="{{URL::to('js/plugin/semi-circle/Semicircle.js')}}"></script>

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
		var map = L.mapbox.map('map', 'inclanfunk.l4mg4b99', {
			zoomControl: false
		}).setView([-39.67, -69.26], 4);

		$(document).ready(function(){
			$('#wid-id-1 h2').text('Pivot Data');
			$('#wid-id-2 h2').text('Waterpump Data');
		    $('#pivotTab').tabs();
		    $('#waterpumpTab').tabs();

		    plotFarms({{ Sentry::getUser()->distributor->company->id }});

		    $.getJSON('/geojson/{{ Sentry::getUser()->distributor->company->geojson }}', function(data){
		    	var layer = L.mapbox.featureLayer();
		    	layer.setGeoJSON(data);
		    	map.fitBounds(layer);
		    });

		    map.on('click', function(e){
		    	$.getJSON('/geojson/{{ Sentry::getUser()->distributor->company->geojson }}', function(data){
			    	var layer = L.mapbox.featureLayer();
			    	layer.setGeoJSON(data);
			    	map.fitBounds(layer);
			    });
				removeFarmsLayers();
				removePivotsLayer();
				map.addLayer(farmsLayer);
				map.addLayer(pivotsLayer);
				plotFarms({{ Sentry::getUser()->distributor->company->id }});
			});

			var farmsLayer = L.layerGroup().addTo(map);

			var pivotsLayer = L.mapbox.featureLayer().addTo(map);

			function removeFarmsLayers(){
				farmsLayer.clearLayers();
				map.removeLayer(farmsLayer);
			}

			function removePivotsLayer(){
				pivotsLayer.clearLayers();
				map.removeLayer(pivotsLayer);
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
							$.each(pivot_item.crop_sections, function(i, item){
								var segment = L.circle([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], parseFloat(pivot_item.radius), {
									startAngle: parseFloat(item.start_angle),
									stopAngle: parseFloat(item.stop_angle),
									color: item.crop.color
								}).addTo(pivotsLayer);
							});
							
							var marker = L.marker([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], {
								icon: L.mapbox.marker.icon({
							        'marker-symbol': 'circle-stroked',
							        'marker-color': '#74DF00'
							    })
							}).addTo(pivotsLayer);

							marker.on('click', function(e){
								//
							});
						}
					});
				});
			}

			    
		});
	</script>

@stop