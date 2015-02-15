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
                <a data-toggle="tab" href="#tab1"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Pivot</span> </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab2"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Pivot Settings</span></a>
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
                            Latitude &amp; Longitude
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="lat1" placeholder="Latitude 1" required>
                                    </label>
                                    @if($errors->first('lat1'))
                                        <em class="invalid">{{ $errors->first('lat1') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="lat2" placeholder="Latitude 2" required>
                                    </label>
                                    @if($errors->first('lat2'))
                                        <em class="invalid">{{ $errors->first('lat2') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="long1" placeholder="Longitude 1" required>
                                    </label>
                                    @if($errors->first('long1'))
                                        <em class="invalid">{{ $errors->first('long1') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="long2" placeholder="Longitude 2" required>
                                    </label>
                                    @if($errors->first('long2'))
                                        <em class="invalid">{{ $errors->first('long2') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
	                </div>
	                <!-- end tab1 -->

	                <!-- tab2 -->
	                <div class="tab-pane fade" id="tab2">
	                	
	                </div>
	                <!-- end tab2 -->

	            </div>

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