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

						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{ URL::to('crops') }}" method="post" enctype="multipart/form-data">
							<header>
								Create a New Crop
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
										<label class="input"> <i class="icon-append fa fa-tree"></i>
											<input type="text" name="title" placeholder="Crop Title" required>
										</label>
										@if($errors->first('title'))
											<em class="invalid">{{ $errors->first('title') }}</em>
										@endif
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-tree"></i>
											<input type="text" name="description" placeholder="Crop Description" required>
										</label>
										@if($errors->first('description'))
											<em class="invalid">{{ $errors->first('description') }}</em>
										@endif
									</section>
								</div>

							</fieldset>

							<header>
								Pick a color
							</header>

							<fieldset>

								<div class="row">
									<section class="col col-4">
										<input name="color" id="html5colorpicker" class="form-control" onchange="clickColor(0, -1, -1, 5)" value="#8ec47c" type="color">
									</section>
								</div>

							</fieldset>


							<footer>
								<button type="submit" class="btn btn-primary">
									Create Crop
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

<!-- JQUERY VALIDATE -->
<script src="{{URL::to('js/plugin/jquery-validate/jquery.validate.min.js')}} "></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{URL::to('js/plugin/masked-input/jquery.maskedinput.min.js')}} "></script>

<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

		});

</script>






@stop