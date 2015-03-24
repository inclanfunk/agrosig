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
        	Water Pump
     	</h2>


        <ul id="widget-tab-1" class="nav nav-tabs pull-right">

            <li class="active">
                <a data-toggle="tab" href="#tab1"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Water Pump</span> </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab2"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Settings</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab3"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Electical Board</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab4"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Deep Well Info</span></a>
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

			<form class="smart-form" novalidate="novalidate" method="post" action="{{ URL::to('waterpumps') }}" enctype="multipart/form-data">

	            <div class="tab-content padding-10">
	            	<!-- tab1 -->
	                <div class="tab-pane fade in active" id="tab1">
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <a class="close" data-dismiss="alert" href="#">×</a>
                                <h4 class="alert-heading">Success!</h4>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <header>
                            Farm and Distributor
                        </header>
                        <fieldset>
                            <div class="row">
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
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="company_id" class="farm">
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
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="lat" placeholder="Latitude" required>
                                    </label>
                                    @if($errors->first('lat'))
                                        <em class="invalid">{{ $errors->first('lat') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="long" placeholder="Longitude" required>
                                    </label>
                                    @if($errors->first('long'))
                                        <em class="invalid">{{ $errors->first('long') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Rotorpump</option>
                                                <option value="2">KSB</option>
                                                <option value="3">Grundfos</option>
                                                <option value="4">Sylwan</option>
                                                <option value="5">Banfy</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_brand'))
                                            <em class="invalid">{{ $errors->first('g_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-wrench"></i>
                                        <input type="text" name="name" placeholder="Name" required>
                                    </label>
                                    @if($errors->first('name'))
                                        <em class="invalid">{{ $errors->first('name') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Submergible</option>
                                                <option value="2">Mechanical</option>
                                                <option value="3">Centrifuged</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_type'))
                                            <em class="invalid">{{ $errors->first('g_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="g_power" placeholder="Power" required>
                                    </label>
                                    @if($errors->first('g_power'))
                                        <em class="invalid">{{ $errors->first('g_power') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="g_volume" placeholder="Input Voltage" required>
                                    </label>
                                    @if($errors->first('g_volume'))
                                        <em class="invalid">{{ $errors->first('g_volume') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="g_hieght" placeholder="Height" required>
                                    </label>
                                    @if($errors->first('g_hieght'))
                                        <em class="invalid">{{ $errors->first('g_hieght') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_engine_type" class="farm">
                                            <option selected="" disabled="">Type of Engine</option>
                                                <option value="1">Capped</option>
                                                <option value="2">Rewindable</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_engine_type'))
                                            <em class="invalid">{{ $errors->first('g_engine_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_voltage" class="farm">
                                            <option selected="" disabled="">Voltage</option>
                                                <option value="1">380</option>
                                                <option value="2">380/660V</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_voltage'))
                                            <em class="invalid">{{ $errors->first('g_voltage') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="g_amperage" placeholder="Amperage" required>
                                    </label>
                                    @if($errors->first('g_amperage'))
                                        <em class="invalid">{{ $errors->first('g_amperage') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
	                </div>
	                <!-- end tab1 -->

	                <!-- tab2 -->
	                <div class="tab-pane fade" id="tab2">
                        <header>
                            Constants
                        </header>
	                	<fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_time_shift_boot" placeholder="Time Shift Boot" required>
                                    </label>
                                    @if($errors->first('s_time_shift_boot'))
                                        <em class="invalid">{{ $errors->first('s_time_shift_boot') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_imbalance" placeholder="Imblance" required>
                                    </label>
                                    @if($errors->first('s_imbalance'))
                                        <em class="invalid">{{ $errors->first('s_imbalance') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_restart_time" placeholder="Restart time" required>
                                    </label>
                                    @if($errors->first('s_restart_time'))
                                        <em class="invalid">{{ $errors->first('s_restart_time') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_low_voltage" placeholder="Low Voltage" required>
                                    </label>
                                    @if($errors->first('s_low_voltage'))
                                        <em class="invalid">{{ $errors->first('s_low_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_high_voltage" placeholder="High Voltage" required>
                                    </label>
                                    @if($errors->first('s_high_voltage'))
                                        <em class="invalid">{{ $errors->first('s_high_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_low_charge" placeholder="Low charge" required>
                                    </label>
                                    @if($errors->first('s_low_charge'))
                                        <em class="invalid">{{ $errors->first('s_low_charge') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Amps per Phase
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_amps_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('s_amps_phase_r'))
                                        <em class="invalid">{{ $errors->first('s_amps_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_amps_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('s_amps_phase_s'))
                                        <em class="invalid">{{ $errors->first('s_amps_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_amps_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('s_amps_phase_t'))
                                        <em class="invalid">{{ $errors->first('s_amps_phase_t') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Line Voltage
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_line_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('s_line_phase_r'))
                                        <em class="invalid">{{ $errors->first('s_line_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_line_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('s_line_phase_s'))
                                        <em class="invalid">{{ $errors->first('s_line_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_line_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('s_line_phase_t'))
                                        <em class="invalid">{{ $errors->first('s_line_phase_t') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Power Factor
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_power_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('s_power_phase_r'))
                                        <em class="invalid">{{ $errors->first('s_power_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_power_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('s_power_phase_s'))
                                        <em class="invalid">{{ $errors->first('s_power_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_power_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('s_power_phase_t'))
                                        <em class="invalid">{{ $errors->first('s_power_phase_t') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
	                </div>
	                <!-- end tab2 -->

                    <!-- tab3 -->
                    <div class="tab-pane fade" id="tab3">
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Triangle</option>
                                                <option value="2">Star</option>
                                                <option value="3">Soft</option>
                                                <option value="4">Direct</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_type'))
                                            <em class="invalid">{{ $errors->first('eb_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_protection" class="farm">
                                            <option selected="" disabled="">Protection Type</option>
                                                <option value="1">Thermal</option>
                                                <option value="2">Electrical</option>
                                                <option value="3">Sub-Monitor</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_protection'))
                                            <em class="invalid">{{ $errors->first('eb_protection') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="eb_line_fuse_caliber" placeholder="Line Fuse Caliber" required>
                                    </label>
                                    @if($errors->first('eb_line_fuse_caliber'))
                                        <em class="invalid">{{ $errors->first('eb_line_fuse_caliber') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Contactors
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_contactor_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Weg</option>
                                                <option value="2">Siemens</option>
                                                <option value="3">Telemecanique</option>
                                                <option value="4">AEG</option>
                                                <option value="5">Schneider</option>
                                                <option value="6">Others</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_contactor_brand'))
                                            <em class="invalid">{{ $errors->first('eb_contactor_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_contactor_power" placeholder="Power" required>
                                    </label>
                                    @if($errors->first('eb_contactor_power'))
                                        <em class="invalid">{{ $errors->first('eb_contactor_power') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Contactor Triangle
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_contactor_triange" class="farm">
                                            <option selected="" disabled="">Contactor Triangle</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_contactor_triange'))
                                            <em class="invalid">{{ $errors->first('eb_contactor_triange') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_contactor_triangle_comment" placeholder="Contactors Triangle Comment" required>
                                    </label>
                                    @if($errors->first('eb_contactor_triangle_comment'))
                                        <em class="invalid">{{ $errors->first('eb_contactor_triangle_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Contactor Star
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_contactor_star" class="farm">
                                            <option selected="" disabled="">Contactor Star</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_contactor_star'))
                                            <em class="invalid">{{ $errors->first('eb_contactor_star') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="contactors_star_comment" placeholder="Contactors Star Comment" required>
                                    </label>
                                    @if($errors->first('eb_contactor_star_comment'))
                                        <em class="invalid">{{ $errors->first('eb_contactor_star_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Contactor of Line
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_contactor_line" class="farm">
                                            <option selected="" disabled="">Contactor of Line</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_contactor_line'))
                                            <em class="invalid">{{ $errors->first('eb_contactor_line') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_contactor_line_comment" placeholder="Contactors of Line Comment" required>
                                    </label>
                                    @if($errors->first('eb_contactor_line_comment'))
                                        <em class="invalid">{{ $errors->first('eb_contactor_line_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                    </div>
                    <!-- end tab3 -->

                    <!-- tab4 -->
                    <div class="tab-pane fade" id="tab4">
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <div class="input input-file">
                                        <span class="button"><input id="file" name="deepwell_info" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</span><input placeholder="Upload Deep Well Info" readonly="" type="text">
                                    </div>
                                    @if($errors->first('deepwell_info'))
                                            <em class="invalid">{{ $errors->first('deepwell_info') }}</em>
                                    @endif
                                </section>
                           </div>
                        </fieldset>
                    </div>
                    <!-- end tab4 -->

	            </div>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        Create Waterpump
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