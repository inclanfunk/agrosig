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
				<form id="cropSection" class="smart-form" novalidate="novalidate">

					<header>
						Crop Section
					</header>

					<fieldset>

						<div class="row">
							<section class="col col-6">
                                <label class="select">
                                    <select name="crop_id">
                                        <option selected="" disabled="">Select Crop</option>
                                        @foreach($crops as $crop)
											<option value="{{ $crop->id }}">{{ $crop->title }}</option>
										@endforeach
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
                                <label class="select">
                                    <select name="predecessor">
                                        <option selected="" disabled="">Select Predecessor Crop</option>
                                        @foreach($crops as $crop)
											<option value="{{ $crop->id }}">{{ $crop->title }}</option>
										@endforeach
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="start_angle" placeholder="Start Angle">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="stop_angle" placeholder="Stop Angle">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="text" name="variety_or_hybrid" placeholder="Variety or Hybrid">
								</label>
							</section>
							<section class="col col-6">
                                <label class="select">
                                    <select name="years">
                                        <option selected="" disabled="">Number of Years</option>
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
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
                                <label class="select">
                                    <select name="seeding_system">
                                        <option selected="" disabled="">Seeding System</option>
                                        <option value="1">Direct</option>
										<option value="2">Traditional</option>
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="density" placeholder="Density">
								</label>
							</section>
							<section class="col col-6">
                                <label class="select">
                                    <select name="density_type">
                                        <option selected="" disabled="">Density Type</option>
                                        <option value="1">KG/Hectares</option>
										<option value="2">Seeds/Hectares</option>
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-clock-o"></i>
									<input type="text" id="my-date-picker" name="date_of_seeding" placeholder="Please Select a Date">
								</label>
							</section>
						</div>

					</fieldset>

					<input type="hidden" name="pivot_id">

					<p id="error" class="text-danger hidden"></p>

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
				<form id="care" class="smart-form" novalidate="novalidate" action="{{ URL::to('companies') }}" method="post" enctype="multipart/form-data">

					<header>
						Care
					</header>

					<fieldset>

						<div class="row">
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="achieve_density" placeholder="Achieve Density">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="distance_between_lines" placeholder="Distance Between Lines">
								</label>
							</section>
							<section class="col col-6">
                                <label class="select">
                                    <select name="irrigation">
                                        <option selected="" disabled="">Irrigation Month</option>
                                        <option value="1">July</option>
                                        <option value="2">August</option>
                                        <option value="3">Semptember</option>
                                        <option value="4">October</option>
                                        <option value="5">November</option>
                                        <option value="6">December</option>
                                        <option value="7">January</option>
                                        <option value="8">February</option>
                                        <option value="9">March</option>
                                        <option value="10">April</option>
                                        <option value="11">May</option>
                                        <option value="12">June</option>
                                    </select> <i></i> </label>
                            </section>
                            <section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="irrigation_quantity" placeholder="Irrigation">
								</label>
							</section>
						</div>

					</fieldset>

					<header>
						Fertilization
					</header>

					<fieldset>

						<div class="row">
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="nitrogen" placeholder="Nitrogen">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="phosphorus" placeholder="Phosphorus">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="pottasium" placeholder="Pottasium">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="sulphur" placeholder="Sulphur">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="other" placeholder="Other">
								</label>
							</section>
						</div>

					</fieldset>

					<header>
						Harvest
					</header>

					<fieldset>

						<div class="row">
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="yield" placeholder="Yield">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-globe"></i>
									<input type="number" name="humidity" placeholder="Humidity">
								</label>
							</section>
							<section class="col col-6">
								<label class="input"> <i class="icon-append fa fa-clock-o"></i>
									<input type="text" id="care-date" name="date_of_harvest" placeholder="Please Select a Date">
								</label>
							</section>
						</div>

					</fieldset>

					<input type="hidden" name="crop_section_id" value="">

					<header>
						Soil Analysis
					</header>

					<h3 class="text-center">Placeholder</h3>

					<p id="careError" class="text-danger hidden"></p>

				</form>
			</div>
			<div class="modal-footer">
				<button id="addCare" class="btn btn-default">Add Care</button>
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

			$(function() {
				$( "#care-date" ).datepicker({ dateFormat: 'yy-mm-dd' });
			});

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
								$('input[name=crop_section_id]').val(item.id);
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

			$('#addCare').on('click', function(e){
				$.ajax({
					url: '{{ URL::to("cares") }}',
					type: 'post',
					dataType: 'json',
					data: $('form#care').serialize(),
					success: function(response){
						$('div#care').modal('toggle');
					},
					error: function(response){
						$('p#careError').removeClass('hidden');
						$('p#careError').empty();
						$.each(response.responseJSON, function(i, item){
							$('p#careError').append(item).append('<br />');
						});
					}
				});
			});

			    
		});
	</script>

@stop