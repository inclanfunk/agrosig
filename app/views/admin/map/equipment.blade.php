@extends('layouts.master')


@section('content')

<style>
	body {
		margin: 0;
		padding: 0; 
	}
	#map {
		position: absolute;
		top: 0;
		bottom: 0;
		width: 100%;
	}
	div.widget-body.no-padding {
		height: 500px;
	}
</style>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-white" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
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

					<div class="widget-toolbar">
						<!-- add: non-hidden - to disable auto hide -->

						<div class="btn-group">
							<button class="btn dropdown-toggle btn-xs btn-primary" data-toggle="dropdown">
								Load XML <i class="icon-caret-down"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="javascript:void(0);"><i class="icon-circle txt-color-green"></i> Realestate XML</a>
								</li>
								<li>
									<a href="javascript:void(0);"><i class="icon-circle txt-color-red"></i> Clients XML</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);"><i class="icon-delete"></i> Cancel</a>
								</li>
							</ul>
						</div>
					</div>

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
						<div id='map'></div>
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

		// Disable drag and zoom handlers.
		map.dragging.disable();
		map.touchZoom.disable();
		map.doubleClickZoom.disable();
		map.scrollWheelZoom.disable();

		// Disable tap handler, if present.
		if (map.tap) map.tap.disable();

		$(document).ready(function(){
		    $('header h2').text('Equipment Map');
		    map.on('click', function(e){
				map.setView([-39.67, -69.26], 4);
			});
		    $.getJSON('distributor-companies', function (data) {
		        var layers = [];
		        $.each(data, function (i, item) {
		            if (item.geojson != '') {
		                layers[i] = L.mapbox.featureLayer().addTo(map);
		                $.getJSON('/geojson/' + item.geojson, function (data) {
		                    layers[i].setGeoJSON(data);
		                    // Loop over the added layer
		                    layers[i].eachLayer(function (layer) {
		                        // Add click event
		                        layer.on('click', function (e) {
		                            // Do stuff
		                            // console.log(layers[i]);
		                            map.fitBounds(layers[i].getBounds());
		                            $.getJSON('distributor/' + item.id + '/farms', function(data){
		                            	var farm_layers = [];
		                            	$.each(data, function(farm_i, farm_item){
		                            		if(farm_item.geojson != ''){
		                            			farm_layers[farm_i] = L.mapbox.featureLayer().addTo(map);
		                            			$.getJSON('/geojson/' + farm_item.geojson, function(data){
		                            				farm_layers[farm_i].setGeoJSON(data);
		                            			});
		                            		}
		                            	});
		                            });
		                        });
		                    });
		                });
		            }
		        });
		    });
		});
	</script>

@stop