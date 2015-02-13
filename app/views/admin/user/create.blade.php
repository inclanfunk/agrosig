@extends('layouts.master')

@section('content')


<div class="jarviswidget" id="wid-id-11" data-widget-colorbutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false">
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
        <h2> 
        	<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
        	User
     	</h2>


        <ul id="widget-tab-1" class="nav nav-tabs pull-right">

            <li class="active">
                <a data-toggle="tab" href="#tab1"> <i class="fa fa-globe"></i> <span class="hidden-mobile hidden-tablet">Global Information</span> </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab2"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Add. Information</span></a>
            </li>

        </ul>

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

			<form class="smart-form" novalidate="novalidate" method="post" action="{{ URL::to('users') }}" enctype="multipart/form-data">

	            <div class="tab-content padding-10">
	            	<!-- tab1 -->
	                <div class="tab-pane fade in active" id="tab1">
	                	<header>
							Basic Information
						</header>
	                	<fieldset>
	                		<div class="row">
	                           	<section class="col col-4">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="first_name" placeholder="First Name" required>
									</label>
									@if($errors->first('first_name'))
										<em class="invalid">{{ $errors->first('first_name') }}</em>
									@endif
								</section>
								<section class="col col-4">
	                                <label class="input"> <i class="icon-append fa fa-user"></i>
	                                    <input type="text" name="last_name" placeholder="Last Name">
	                                </label>
	                                @if($errors->first('last_name'))
										<em class="invalid">{{ $errors->first('last_name') }}</em>
									@endif
	                            </section>
	                            <section class="col col-4">
	                                <label class="input"> <i class="icon-append fa fa-envelope"></i>
	                                    <input type="text" name="email" placeholder="Email">
	                                </label>
	                                @if($errors->first('email'))
										<em class="invalid">{{ $errors->first('email') }}</em>
									@endif
	                            </section>
                            </div>
                        </fieldset>
                        <header>
                            Contact Information
                        </header>
                        <fieldset>
	                		<div class="row">
	                           	<section class="col col-4">
									<label class="input"> <i class="icon-append fa fa-phone"></i>
										<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
									</label>
									@if($errors->first('phone'))
										<em class="invalid">{{ $errors->first('phone') }}</em>
									@endif
								</section>
								<section class="col col-4">
	                                <label class="input"> <i class="icon-append fa fa-facebook"></i>
	                                    <input type="text" name="facebook" placeholder="Facebook Handle">
	                                </label>
	                                @if($errors->first('facebook'))
										<em class="invalid">{{ $errors->first('facebook') }}</em>
									@endif
	                            </section>
	                            <section class="col col-4">
	                                <label class="input"> <i class="icon-append fa fa-twitter"></i>
	                                    <input type="text" name="twitter" placeholder="Twitter Handle">
	                                </label>
	                                @if($errors->first('twitter'))
										<em class="invalid">{{ $errors->first('twitter') }}</em>
									@endif
	                            </section>
                            </div>

                        </fieldset>

                        <header>
                            Password
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-key"></i>
                                        <input type="password" name="password" placeholder="Password">
                                    </label>
                                    @if($errors->first('password'))
                                        <em class="invalid">{{ $errors->first('password') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-key"></i>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                    </label>
                                    @if($errors->first('password_confirmation'))
                                        <em class="invalid">{{ $errors->first('password_confirmation') }}</em>
                                    @endif
                                </section>
                            </div>

                        </fieldset>

                        <header>
                            Select User Type
                        </header>
	                	<fieldset>

                           <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="type" id="type">
                                            <option selected="" disabled="">Please Select a User Type</option>
                                            <option value="1">Manager</option>
                                            <option value="2">Distributor</option>
                                            <option value="3">Water Pump Reseller</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('type'))
                                            <em class="invalid">{{ $errors->first('type') }}</em>
                                        @endif
                                </section>
                        </fieldset>

                        <header>
                            Upload a Photo
                        </header>

                        <fieldset>

                           <div class="row">
                                <section class="col col-6">
                                    <div class="input input-file">
                                        <span class="button"><input id="file" name="photo" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</span><input placeholder="Upload Photo" readonly="" type="text">
                                    </div>
                                    @if($errors->first('photo'))
                                            <em class="invalid">{{ $errors->first('photo') }}</em>
                                    @endif
                                </section>
                        </fieldset>
	                </div>
	                <!-- end tab1 -->

	                <!-- tab2 -->
	                <div class="tab-pane fade" id="tab2">
	                	<header>
							Manager
						</header>
	                	<fieldset>
	                		<div class="row">
	                           	<section class="col col-4">
                                    <label class="select">
                                        <select name="company_id" class="farm">
                                            <option selected="" disabled="">Please Select a Farm Company</option>
                                            @foreach($farm_companies as $company)
                                            	<option value="{{ $company->id }}">
                                            		{{ $company->name }}
                                            	</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                        @if($errors->first('company_id'))
											<em class="invalid">{{ $errors->first('company_id') }}</em>
										@endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="farm_id" class="farm">
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
                            </div>

                        </fieldset>

                        <header>
							Distributor
						</header>

                        <fieldset>
	                		<div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="company_id" class="distributor">
                                            <option selected="" disabled="">Please Select a Distributor Company</option>
                                            @foreach($distributor_companies as $company)
                                            	<option value="{{ $company->id }}">
                                            		{{ $company->name }}
                                            	</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                        @if($errors->first('company_id'))
											<em class="invalid">{{ $errors->first('company_id') }}</em>
										@endif
                                </section>
                            </div>
                        </fieldset>

                        <header>
							Water Pump Reseller
						</header>

                        <fieldset>
	                		<div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="company_id" class="water">
                                            <option selected="" disabled="">Please Select a Water Pump Company</option>
                                            @foreach($water_pump_companies as $company)
                                            	<option value="{{ $company->id }}">
                                            		{{ $company->name }}
                                            	</option>
                                            @endforeach
                                        </select> <i></i> </label>
                                        @if($errors->first('company_id'))
											<em class="invalid">{{ $errors->first('company_id') }}</em>
										@endif
                                </section>
                            </div>

                        </fieldset>
	                </div>
	                <!-- end tab2 -->

	            </div>

	            <footer>
					<button type="submit" class="btn btn-primary">
						Create User
					</button>
				</footer>

            </form>

        </div>
        <!-- end widget content -->

    </div>
    <!-- end widget div -->

</div>
<!-- end widget -->

@stop

@section('custom-js')

	<script type="text/javascript">

		$(document).ready(function() {
			$('#type').on('change', function(){
				if($('#type').val() == 1){
					$('.distributor').prop('disabled', true);
					$('.water').prop('disabled', true);
					$('.farm').prop('disabled', false);
				}else if($('#type').val() == 2){
					$('.water').prop('disabled', true);
					$('.farm').prop('disabled', true);
					$('.distributor').prop('disabled', false);
				}else{
					$('.farm').prop('disabled', true);
					$('.distributor').prop('disabled', true);
					$('.water').prop('disabled', false);
				}
			});
		});

	</script>

@stop