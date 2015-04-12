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

<!-- Modal -->
<div class="modal fade" id="cropSection" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Crop Section</h4>
			</div>
			<div class="modal-body">
				<form id="cropSection" method="POST" action="{{ URL::to('crop-sections') }}">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Select Crop</label>
									<select name="crop_id" class="form-control">
										@foreach($crops as $crop)
											<option value="{{ $crop->id }}">{{ $crop->title }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Start Angle</label>
									<input name="start_angle" type="number" class="form-control" placeholder="Start Angle">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Select Predecessor Crop</label>
									<select name="predecessor" class="form-control">
										@foreach($crops as $crop)
											<option value="{{ $crop->id }}">{{ $crop->title }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Stop Angle</label>
									<input name="stop_angle" type="number" class="form-control" placeholder="Stop Angle">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Variety or Hybrid</label>
									<input name="variety_or_hybrid" type="text" class="form-control" placeholder="Variety or Hybrid">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Number of Years</label>
									<select name="years" class="form-control">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="10+">10+</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Seeding System</label>
									<select name="seeding_system" class="form-control">
										<option value="1">Direct</option>
										<option value="2">Traditional</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Density</label>
									<input name="density" type="number" class="form-control form-inline" placeholder="Density">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Density Type</label>
									<select name="density_type" class="form-control form-inline">
										<option value="1">KG/Hectares</option>
										<option value="2">Seeds/Hectares</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Date of Seeding</label>
										<input class="form-control form-inline" type="text" id="my-date-picker" name="date_of_seeding" placeholder="Please Select a Date">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<p id="error" class="text-danger hidden"></p>
							</div>
						</div>
					</div>

					<input name="pivot_id" hidden="true"></input>

				</form>
			</div>
			<div class="modal-footer">
				<button id="createSection" class="btn btn-default">Create Section</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="care" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Care to Section</h4>
			</div>
			<div class="modal-body">
				<form id="care" method="POST" action="#">
					<div class="container-fluid">
						<h2>Placeholder</h2>
					</div>
					<input name="crop_section_id" hidden="true"></input>

				</form>
			</div>
			<div class="modal-footer">
				<button id="createSection" class="btn btn-default">Add Care</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@stop

@section('custom-js')

		<script type="text/javascript" src="{{URL::to('js/plugin/semi-circle/Semicircle.js')}}"></script>

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();

			$( "#my-date-picker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			
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

						$.each(pivot_item.crop_sections, function(i, item){
							var segment = L.circle([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], parseFloat(pivot_item.radius), {
								startAngle: parseFloat(item.start_angle),
								stopAngle: parseFloat(item.stop_angle),
								color: item.crop.color
							}).addTo(map);

							segment.on('click', function(e){
								map.setView(e.latlng, 16);
								$('#care').modal({ show: true });
								$('input[name=crop_section_id]').val(crop_section.id);
							});
						});

						if(pivot_item.lat != ''){

							var marker = L.marker([parseFloat(pivot_item.lat), parseFloat(pivot_item.long)], {
								icon: L.mapbox.marker.icon({
							        'marker-symbol': 'hospital',
							        'marker-color': '#74DF00'
							    })
							}).addTo(pivotsLayer);


							marker.on('click', function(e){

								map.setView(e.latlng, 15);
								$('#cropSection').modal({ show: true });
								$('input[name=pivot_id]').val(pivot_item.id);
								$('p#error').empty();

							});
						}
					});
				});
			}

			$('#createSection').on('click', function(e){
				$.ajax({
					url: '{{ URL::to("crop-sections") }}',
					type: 'post',
					dataType: 'json',
					data: $('form#cropSection').serialize(),
					success: function(response){
						$('div#cropSection').modal('toggle');
						var segment = L.circle([parseFloat(response.pivot.lat), parseFloat(response.pivot.long)], parseFloat(response.pivot.radius), {
							startAngle: parseFloat(response.start_angle),
							stopAngle: parseFloat(response.stop_angle),
							color: response.crop.color
						}).addTo(map);

						segment.on('click', function(e){
							map.setView(e.latlng, 16);
							$('#care').modal({ show: true });
							$('input[name=crop_section_id]').val(crop_section.id);
						});
					},
					error: function(response){
						$('p#error').removeClass('hidden');
						$('p#error').empty();
						$.each(response.responseJSON, function(i, item){
							$('p#error').append(item).append('<br />');
						});
					}
				});
			});

			    
		});
	</script>

@stop