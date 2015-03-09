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
					<h2> Topic </h2>

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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('topics') }}" method="post" enctype="multipart/form-data">
							<header>
								Create a New Topic
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
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-pencil"></i>
											<input type="text" name="name" placeholder="Name" required>
										</label>
										@if($errors->first('name'))
											<em class="invalid">{{ $errors->first('name') }}</em>
										@endif
									</section>
									<section class="col col-6">
                                        <label class="select">
                                            <select name="section_id">
                                                <option selected="" disabled="">Please Select a Section</option>
                                                @foreach($sections as $section)
                                                	<option value="{{ $section->id }}">
                                                		{{ $section->name }}
                                                	</option>
                                                @endforeach
                                            </select> <i></i> </label>
                                            @if($errors->first('section_id'))
												<em class="invalid">{{ $errors->first('section_id') }}</em>
											@endif
                                    </section>
								</div>

							</fieldset>

							<footer>
								<button type="submit" class="btn btn-primary">
									Create Topic
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
<!-- JQUERY MASKED INPUT -->
<script src="{{URL::to('js/libs/fontawesome-iconpicker.min.js')}} "></script>

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