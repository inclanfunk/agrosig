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
					<h2> Company </h2>

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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('companies') }}" method="post" enctype="multipart/form-data">
							<header>
								Create a New Company
							</header>

							<fieldset>
								<div class="row">
                                    <section class="col col-10">
                                        <label class="select">
                                            <select name="type">
                                                <option selected="" disabled="">Please Select a Company Type</option>
                                                <option value="1">Farm Company</option>
                                                <option value="2">Distributor Company</option>
                                                <option value="3">Water Pump Company</option>
                                            </select> <i></i> </label>
                                            @if($errors->first('type'))
												<em class="invalid">{{ $errors->first('type') }}</em>
											@endif
                                    </section>
                                </div>

                                <div class="row" id="admin" style="display:none; ">
                                    <section class="col col-10">
                                        <label class="select">
                                            <select name="admin_id" id="admin_role">

                                            </select> <i></i> </label>
                                    </section>
                                </div>

								<div class="row">
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-briefcase"></i>
											<input type="text" name="name" placeholder="Company Name" required>
										</label>
										@if($errors->first('name'))
											<em class="invalid">{{ $errors->first('name') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="ceo_first_name" placeholder="CEO First Name" required>
										</label>
										@if($errors->first('ceo_first_name'))
											<em class="invalid">{{ $errors->first('ceo_first_name') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="ceo_last_name" placeholder="CEO Last Name">
										</label>
										@if($errors->first('ceo_last_name'))
											<em class="invalid">{{ $errors->first('ceo_last_name') }}</em>
										@endif
									</section>
								</div>

							</fieldset>

							<fieldset>

								<div class="row">
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-globe"></i>
											<input type="text" name="direction" placeholder="Direction">
										</label>
										@if($errors->first('direction'))
											<em class="invalid">{{ $errors->first('direction') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-globe"></i>
											<input type="text" name="zip" placeholder="Zip">
										</label>
										@if($errors->first('zip'))
											<em class="invalid">{{ $errors->first('zip') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-globe"></i>
											<input type="text" name="state" placeholder="State">
										</label>
										@if($errors->first('state'))
											<em class="invalid">{{ $errors->first('state') }}</em>
										@endif
									</section>
								</div>

								<div class="row">
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-globe"></i>
											<input type="text" name="country" placeholder="Country">
										</label>
										@if($errors->first('country'))
											<em class="invalid">{{ $errors->first('country') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
										</label>
										@if($errors->first('phone'))
											<em class="invalid">{{ $errors->first('phone') }}</em>
										@endif
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-append fa fa-fax"></i>
											<input type="text" name="fax" placeholder="Fax">
										</label>
										@if($errors->first('fax'))
											<em class="invalid">{{ $errors->first('fax') }}</em>
										@endif
									</section>
								</div>

							</fieldset>

							<fieldset>

								<div class="row">
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-append fa fa-globe"></i>
                                            <input type="text" name="website" placeholder="Website">
                                        </label>
                                        @if($errors->first('website'))
											<em class="invalid">{{ $errors->first('website') }}</em>
										@endif
                                    </section>
                                    <section class="col col-6">
                                        <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                            <input type="text" name="email" placeholder="Email">
                                        </label>
                                        @if($errors->first('email'))
											<em class="invalid">{{ $errors->first('email') }}</em>
										@endif
                                    </section>
                                    
                               </div>

                               <div class="row">
                                    <section class="col col-6">
										<div class="input input-file">
											<span class="button"><input id="file" name="geojson" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</span><input placeholder="Upload GeoJSON" readonly="" type="text">
										</div>
										@if($errors->first('geojson'))
												<em class="invalid">{{ $errors->first('geojson') }}</em>
										@endif
									</section>
                                    <section class="col col-6">
										<div class="input input-file">
											<span class="button"><input id="file" name="logo" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</span><input placeholder="Upload Logo" readonly="" type="text">
										</div>
										@if($errors->first('logo'))
												<em class="invalid">{{ $errors->first('logo') }}</em>
										@endif
									</section>
                               </div>

                            </fieldset>

							<fieldset>

                               <div class="row">
                                    <section class="col col-6">
										<label class="textarea"> 										
											<textarea rows="3" class="custom-scroll" name="description" placeholder="Description"></textarea> 
										</label>
										<div class="note">
											<strong>Enter a description for the company.</strong>
										</div>
										@if($errors->first('description'))
											<em class="invalid">{{ $errors->first('description') }}</em>
										@endif
									</section>
                               </div>

							</fieldset>



							<footer>
								<button type="submit" class="btn btn-primary">
									Create Company
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