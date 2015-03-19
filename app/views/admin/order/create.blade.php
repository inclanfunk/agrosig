@extends('layouts.master')


@section('content')

<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
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
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2> Working Order </h2>

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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('orders') }}" method="post" enctype="multipart/form-data">
							<header>
								Create a New Working Order
							</header>

							@if(Session::get('success'))
	                            <div class="alert alert-success alert-block">
	                                <a class="close" data-dismiss="alert" href="#">×</a>
	                                <h4 class="alert-heading">Success!</h4>
	                                {{ Session::get('success') }}
	                            </div>
	                        @endif

	                        <fieldset>
	                            <div class="row">
	                                <section class="col col-4">
	                                    <label class="select">
	                                        <select name="farm_id">
	                                            <option selected="" disabled="">Please Select a Farm</option>
	                                            @foreach($farms as $farm)
	                                                <option value="{{ $farm->id }}">
	                                                    {{ $farm->name }}
	                                                </option>
	                                            @endforeach
	                                        </select> <i></i> </label>
	                                        @if($errors->first('farm_id'))
	                                            <em class="invalid">{{ $errors->first('farm_id') }}</em>
	                                        @endif
	                                </section>
	                                <section class="col col-4">
	                                    <label class="select">
	                                        <select name="company_id">
	                                            <option selected="" disabled="">Please Select a Distributor Company</option>
	                                            @foreach($distributor_companies as $distributor_company)
	                                                <option value="{{ $distributor_company->id }}">
	                                                    {{ $distributor_company->name }}
	                                                </option>
	                                            @endforeach
	                                        </select> <i></i> </label>
	                                        @if($errors->first('company_id'))
	                                            <em class="invalid">{{ $errors->first('company_id') }}</em>
	                                        @endif
	                                </section>
	                                <section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-briefcase"></i>
											<input type="text" name="order_number" placeholder="Order Number" required>
										</label>
										@if($errors->first('order_number'))
											<em class="invalid">{{ $errors->first('order_number') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-clock-o"></i>
											<input type="text" id="my-date-picker" name="date" placeholder="Please Select a Date">
										</label>
										@if($errors->first('date'))
											<em class="invalid">{{ $errors->first('date') }}</em>
										@endif
									</section>
	                            </div>
	                        </fieldset>

	                        <header>
								Pivot
							</header>

	                        <fieldset>
	                            <div class="row">
									<section class="col col-4">
	                                    <label class="select">
	                                        <select name="pivot_id">
	                                            <option selected="" disabled="">Please Select a Pivot</option>
	                                        </select> <i></i> </label>
	                                        @if($errors->first('pivot_id'))
	                                            <em class="invalid">{{ $errors->first('pivot_id') }}</em>
	                                        @endif
	                                </section>
	                                <section class="col col-4">
                                        <label class="select">
                                            <select name="pivot_task">
                                                <option selected="" disabled="">Please Select a Task</option>
                                                <option value="1">Labor</option>
                                                <option value="2">Changing Parts</option>
                                                <option value="3">Labor & Changing Part</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('pivot_task'))
												<em class="invalid">{{ $errors->first('pivot_task') }}</em>
											@endif
                                    </section>
	                            </div>
	                        </fieldset>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="pivot_category">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Gear Train</option>
                                                <option value="2">Electricity</option>
                                                <option value="3">Sprinkling</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('pivot_category'))
												<em class="invalid">{{ $errors->first('pivot_category') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="gear_train">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Masa</option>
                                                <option value="2">Motor Reduction</option>
                                                <option value="3">Cross Head</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('gear_train'))
												<em class="invalid">{{ $errors->first('gear_train') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="electricity">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Electronic</option>
                                                <option value="2">Box Section</option>
                                                <option value="3">Panels</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('electricity'))
												<em class="invalid">{{ $errors->first('electricity') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="sprinkling">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Wear</option>
                                                <option value="2">Flow Changes</option>
                                                <option value="3">Others</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('sprinkling'))
												<em class="invalid">{{ $errors->first('sprinkling') }}</em>
											@endif
                                    </section>
	                            </div>
	                        </fieldset>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-3">
	                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
	                                        <input type="number" name="pivot_cost" placeholder="Cost" required>
	                                    </label>
	                                    @if($errors->first('pivot_cost'))
	                                        <em class="invalid">{{ $errors->first('pivot_cost') }}</em>
	                                    @endif
	                                </section>
	                            </div>
	                        </fieldset>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-4">
	                                    <label class="select">
	                                        <select name="waterpump_id">
	                                            <option selected="" disabled="">Please Select a Waterpump</option>
	                                        </select> <i></i> </label>
	                                        @if($errors->first('waterpump_id'))
	                                            <em class="invalid">{{ $errors->first('waterpump_id') }}</em>
	                                        @endif
	                                </section>
	                                <section class="col col-4">
                                        <label class="select">
                                            <select name="waterpump_task">
                                                <option selected="" disabled="">Please Select a Task</option>
                                                <option value="1">Labor</option>
                                                <option value="2">Changing Parts</option>
                                                <option value="3">Labor & Changing Part</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('waterpump_task'))
												<em class="invalid">{{ $errors->first('waterpump_task') }}</em>
											@endif
                                    </section>
	                            </div>
	                        </fieldset>

	                        <header>
								Waterpump
							</header>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="waterpump_category">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Motor</option>
                                                <option value="2">Electrical Board</option>
                                                <option value="3">Waterpump</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('waterpump_category'))
												<em class="invalid">{{ $errors->first('waterpump_category') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="motor">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Mechanical Break</option>
                                                <option value="2">Burnout</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('motor'))
												<em class="invalid">{{ $errors->first('motor') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="electrical_board">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Protection Failure</option>
                                                <option value="2">Others</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('electrical_board'))
												<em class="invalid">{{ $errors->first('electrical_board') }}</em>
											@endif
                                    </section>
                                    <section class="col col-3">
                                        <label class="select">
                                            <select name="waterpump">
                                                <option selected="" disabled="">Please Select a Category</option>
                                                <option value="1">Mechanical Break</option>
                                                <option value="2">Lack of Water</option>
                                                <option value="3">Extration of Sand</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('waterpump'))
												<em class="invalid">{{ $errors->first('waterpump') }}</em>
											@endif
                                    </section>
	                            </div>
	                        </fieldset>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-3">
	                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
	                                        <input type="number" name="waterpump_cost" placeholder="Cost" required>
	                                    </label>
	                                    @if($errors->first('waterpump_cost'))
	                                        <em class="invalid">{{ $errors->first('waterpump_cost') }}</em>
	                                    @endif
	                                </section>
	                            </div>
	                        </fieldset>

	                        <fieldset>
	                            <div class="row">
                                    <section class="col col-3">
	                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
	                                        <input type="number" name="total_cost" placeholder="Total Cost" required>
	                                    </label>
	                                    @if($errors->first('total_cost'))
	                                        <em class="invalid">{{ $errors->first('total_cost') }}</em>
	                                    @endif
	                                </section>
	                            </div>
	                        </fieldset>

							<footer>
								<button type="submit" class="btn btn-primary">
									Create Working Order
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->


                        @if(Session::has('error_msg'))
                                        <p class="alert alert-danger">{{Session::get('error_msg')}}</p>
                        @endif

                        @if (Session::has('message'))
                           <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif


				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

@stop

@section('custom-js')

<!-- JQUERY VALIDATE -->
<script src="{{URL::to('js/plugin/jquery-validate/jquery.validate.min.js')}} "></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{URL::to('js/plugin/masked-input/jquery.maskedinput.min.js')}} "></script>

<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			$(function() {
				$( "#my-date-picker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			});

			$('select[name=farm_id]').on('change', function(e){
				$('select[name=pivot_id]').empty();
				$('select[name=waterpump_id]').empty();
				var farm_id = $('select[name=farm_id]').val();
				$.getJSON('/farm/' + farm_id + '/pivots', function(response){
					$.each(response, function(i, pivot){
						$('select[name=pivot_id]').append($('<option>', { 
							value: pivot.id,
							text : pivot.name 
						}));
					});
				});
				$.getJSON('/farm/' + farm_id + '/waterpumps', function(response){
					$.each(response, function(i, waterpump){
						$('select[name=waterpump_id]').append($('<option>', { 
							value: waterpump.id,
							text : waterpump.name 
						}));
					});
				})
			});

			$('input[name=pivot_cost]').on('change', function(e){
				$('input[name=total_cost]').val(parseInt($('input[name=pivot_cost]').val()) + parseInt($('input[name=waterpump_cost]').val()));
			});

			$('input[name=waterpump_cost]').on('change', function(e){
				$('input[name=total_cost]').val(parseInt($('input[name=pivot_cost]').val()) + parseInt($('input[name=waterpump_cost]').val()));
			});

			$('input[name=total_cost]').prop('disabled', true);

			// Pivots elements
			$('select[name=gear_train]').prop('disabled', true);
			$('select[name=electricity]').prop('disabled', true);
			$('select[name=sprinkling]').prop('disabled', true);

			$('select[name=gear_train]').parent().addClass('state-disabled');
			$('select[name=electricity]').parent().addClass('state-disabled');
			$('select[name=sprinkling]').parent().addClass('state-disabled');

			$('select[name=pivot_category]').on('change', function(e){
				if($('select[name=pivot_category]').val() == 1){
					$('select[name=gear_train]').prop('disabled', false);
					$('select[name=gear_train]').parent().removeClass('state-disabled');

					$('select[name=electricity]').prop('disabled', true);
					$('select[name=sprinkling]').prop('disabled', true);
					$('select[name=electricity]').parent().addClass('state-disabled');
					$('select[name=sprinkling]').parent().addClass('state-disabled');
				}else if($('select[name=pivot_category]').val() == 2){
					$('select[name=electricity]').prop('disabled', false);
					$('select[name=electricity]').parent().removeClass('state-disabled');

					$('select[name=gear_train]').prop('disabled', true);
					$('select[name=sprinkling]').prop('disabled', true);
					$('select[name=gear_train]').parent().addClass('state-disabled');
					$('select[name=sprinkling]').parent().addClass('state-disabled');
				}else if($('select[name=pivot_category]').val() == 3){
					$('select[name=sprinkling]').prop('disabled', false);
					$('select[name=sprinkling]').parent().removeClass('state-disabled');

					$('select[name=electricity]').prop('disabled', true);
					$('select[name=gear_train]').prop('disabled', true);
					$('select[name=electricity]').parent().addClass('state-disabled');
					$('select[name=gear_train]').parent().addClass('state-disabled');
				}
			});

			// Watetpump elements
			$('select[name=motor]').prop('disabled', true);
			$('select[name=electrical_board]').prop('disabled', true);
			$('select[name=waterpump]').prop('disabled', true);

			$('select[name=motor]').parent().addClass('state-disabled');
			$('select[name=electrical_board]').parent().addClass('state-disabled');
			$('select[name=waterpump]').parent().addClass('state-disabled');

			$('select[name=waterpump_category]').on('change', function(e){
				if($('select[name=waterpump_category]').val() == 1){
					$('select[name=motor]').prop('disabled', false);
					$('select[name=motor]').parent().removeClass('state-disabled');

					$('select[name=electrical_board]').prop('disabled', true);
					$('select[name=waterpump]').prop('disabled', true);
					$('select[name=electrical_board]').parent().addClass('state-disabled');
					$('select[name=waterpump]').parent().addClass('state-disabled');
				}else if($('select[name=waterpump_category]').val() == 2){
					$('select[name=electrical_board]').prop('disabled', false);
					$('select[name=electrical_board]').parent().removeClass('state-disabled');

					$('select[name=motor]').prop('disabled', true);
					$('select[name=waterpump]').prop('disabled', true);
					$('select[name=motor]').parent().addClass('state-disabled');
					$('select[name=waterpump]').parent().addClass('state-disabled');
				}else if($('select[name=waterpump_category]').val() == 3){
					$('select[name=waterpump]').prop('disabled', false);
					$('select[name=waterpump]').parent().removeClass('state-disabled');

					$('select[name=electrical_board]').prop('disabled', true);
					$('select[name=motor]').prop('disabled', true);
					$('select[name=electrical_board]').parent().addClass('state-disabled');
					$('select[name=motor]').parent().addClass('state-disabled');
				}
			});

			// START AND FINISH DATE
			$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});

			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});


			  $('#first_role').change(function(){

                        var ktype = $(this).val();

                             if(ktype == "Client")   {

                                 $('#admin').show();

                                        $.ajax({
                                            type: 'GET',
                                            url:  '{{ URL::to('/api/apicreate') }}',
                                            success:function(veri){
                                                $.each(veri,function(i,deger){

                                                    $('#admin_role').append('<option value="'+deger.id+'">' +deger.first_name+ '</option>' );

                                                }); // each

                                            },
                                            error:function(x,hata){
                                                alert("Hata Oluştu" +hata);
                                            }

                                        }); // ajax

                             } else {  // else bölümü tekrar kullanıcı tipi secince altbayi selection ı saklar ve içindeki bilgiyi temizler
                                 $('#admin').hide();
                                   if($('#admin_role').val()){
                                       $('#admin_role').empty();
                                   }

                             } // if s

                    }); // change








		})

</script>






@stop