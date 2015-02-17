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
                                        <select name="waterpump_reseller_id" class="farm">
                                            <option selected="" disabled="">Please Select a Water Pump Reseller</option>
                                            @foreach($waterpump_resellers as $waterpump_reseller)
                                                <option value="{{ $waterpump_reseller->id }}">
                                                    {{ $waterpump_reseller->first_name }} {{ $waterpump_reseller->last_name }}
                                                </option>
                                            @endforeach
                                        </select> <i></i> </label>
                                        @if($errors->first('waterpump_reseller_id'))
                                            <em class="invalid">{{ $errors->first('waterpump_reseller_id') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="lat" placeholder="Latitude" required>
                                    </label>
                                    @if($errors->first('lat'))
                                        <em class="invalid">{{ $errors->first('lat') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="long" placeholder="Longitude" required>
                                    </label>
                                    @if($errors->first('long'))
                                        <em class="invalid">{{ $errors->first('long') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Rotorpump</option>
                                                <option value="2">KSB</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('brand'))
                                            <em class="invalid">{{ $errors->first('brand') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Submergible</option>
                                                <option value="2">Mechanical</option>
                                                <option value="3">Centrifuged</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('type'))
                                            <em class="invalid">{{ $errors->first('type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="power" class="farm">
                                            <option selected="" disabled="">Power</option>
                                                <option value="1">200 HP</option>
                                                <option value="2">300 HP</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('power'))
                                            <em class="invalid">{{ $errors->first('power') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="volume" placeholder="Input Voltage" required>
                                    </label>
                                    @if($errors->first('volume'))
                                        <em class="invalid">{{ $errors->first('volume') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="height" placeholder="Height" required>
                                    </label>
                                    @if($errors->first('height'))
                                        <em class="invalid">{{ $errors->first('height') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="engine_type" class="farm">
                                            <option selected="" disabled="">Type of Engine</option>
                                                <option value="1">Capped</option>
                                                <option value="2">Rewindable</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('engine_type'))
                                            <em class="invalid">{{ $errors->first('engine_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="voltage" class="farm">
                                            <option selected="" disabled="">Voltage</option>
                                                <option value="1">380</option>
                                                <option value="2">380/660V</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('voltage'))
                                            <em class="invalid">{{ $errors->first('voltage') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="number" name="amperage" placeholder="Amperage" required>
                                    </label>
                                    @if($errors->first('amperage'))
                                        <em class="invalid">{{ $errors->first('amperage') }}</em>
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
                                        <input type="text" name="time_shift_boot" placeholder="Time Shift Boot" required>
                                    </label>
                                    @if($errors->first('time_shift_boot'))
                                        <em class="invalid">{{ $errors->first('time_shift_boot') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="imbalance" placeholder="Imblance" required>
                                    </label>
                                    @if($errors->first('imbalance'))
                                        <em class="invalid">{{ $errors->first('imbalance') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="restart_time" placeholder="Restart time" required>
                                    </label>
                                    @if($errors->first('restart_time'))
                                        <em class="invalid">{{ $errors->first('restart_time') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="low_voltage" placeholder="Low Voltage" required>
                                    </label>
                                    @if($errors->first('low_voltage'))
                                        <em class="invalid">{{ $errors->first('low_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="high_voltage" placeholder="High Voltage" required>
                                    </label>
                                    @if($errors->first('high_voltage'))
                                        <em class="invalid">{{ $errors->first('high_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="low_charge" placeholder="Low charge" required>
                                    </label>
                                    @if($errors->first('low_charge'))
                                        <em class="invalid">{{ $errors->first('low_charge') }}</em>
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
                                        <input type="text" name="amps_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('amps_phase_r'))
                                        <em class="invalid">{{ $errors->first('amps_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="amps_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('amps_phase_s'))
                                        <em class="invalid">{{ $errors->first('amps_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="amps_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('amps_phase_t'))
                                        <em class="invalid">{{ $errors->first('amps_phase_t') }}</em>
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
                                        <input type="text" name="line_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('line_phase_r'))
                                        <em class="invalid">{{ $errors->first('line_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="line_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('line_phase_s'))
                                        <em class="invalid">{{ $errors->first('line_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="line_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('line_phase_t'))
                                        <em class="invalid">{{ $errors->first('line_phase_t') }}</em>
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
                                        <input type="text" name="power_phase_r" placeholder="Phase R" required>
                                    </label>
                                    @if($errors->first('power_phase_r'))
                                        <em class="invalid">{{ $errors->first('power_phase_r') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="power_phase_s" placeholder="Phase S" required>
                                    </label>
                                    @if($errors->first('power_phase_s'))
                                        <em class="invalid">{{ $errors->first('power_phase_s') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="power_phase_t" placeholder="Phase T" required>
                                    </label>
                                    @if($errors->first('power_phase_t'))
                                        <em class="invalid">{{ $errors->first('power_phase_t') }}</em>
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
                                        <select name="electrical_board_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Triangle</option>
                                                <option value="2">Star</option>
                                                <option value="3">Soft</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('electrical_board_type'))
                                            <em class="invalid">{{ $errors->first('electrical_board_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="electrical_board_protection" class="farm">
                                            <option selected="" disabled="">Protection Type</option>
                                                <option value="1">Triangle</option>
                                                <option value="2">Star</option>
                                                <option value="3">Soft</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('electrical_board_protection'))
                                            <em class="invalid">{{ $errors->first('electrical_board_protection') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="line_fuse_caliber" placeholder="Line Fuse Caliber" required>
                                    </label>
                                    @if($errors->first('line_fuse_caliber'))
                                        <em class="invalid">{{ $errors->first('line_fuse_caliber') }}</em>
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
                                        <select name="contactor_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Weg</option>
                                                <option value="2">Siemens</option>
                                                <option value="3">Telemecanique</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('contactor_brand'))
                                            <em class="invalid">{{ $errors->first('contactor_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="contactor_power" placeholder="Power" required>
                                    </label>
                                    @if($errors->first('contactor_power'))
                                        <em class="invalid">{{ $errors->first('contactor_power') }}</em>
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
                                        <select name="contactor_triange" class="farm">
                                            <option selected="" disabled="">Contactor Triangle</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('contactor_triange'))
                                            <em class="invalid">{{ $errors->first('contactor_triange') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="contactor_triangle_comment" placeholder="Contactors Triangle Comment" required>
                                    </label>
                                    @if($errors->first('contactor_triangle_comment'))
                                        <em class="invalid">{{ $errors->first('contactor_triangle_comment') }}</em>
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
                                        <select name="contactor_star" class="farm">
                                            <option selected="" disabled="">Contactor Star</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('contactor_star'))
                                            <em class="invalid">{{ $errors->first('contactor_star') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="contactors_star_comment" placeholder="Contactors Star Comment" required>
                                    </label>
                                    @if($errors->first('contactor_star_comment'))
                                        <em class="invalid">{{ $errors->first('contactor_star_comment') }}</em>
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
                                        <select name="contactor_line" class="farm">
                                            <option selected="" disabled="">Contactor of Line</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('contactor_line'))
                                            <em class="invalid">{{ $errors->first('contactor_line') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="contactor_line_comment" placeholder="Contactors of Line Comment" required>
                                    </label>
                                    @if($errors->first('contactor_line_comment'))
                                        <em class="invalid">{{ $errors->first('contactor_line_comment') }}</em>
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