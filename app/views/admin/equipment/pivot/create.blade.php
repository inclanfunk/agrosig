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
        	Pivot
     	</h2>


        <ul id="widget-tab-1" class="nav nav-tabs pull-right">

            <li class="active">
                <a data-toggle="tab" href="#tab1"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Pivot</span> </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab2"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Settings</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab3"> <i class="fa fa-gear"></i> <span class="hidden-mobile hidden-tablet">Electical Board</span></a>
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

			<form class="smart-form" novalidate="novalidate" method="post" action="{{ URL::to('pivots') }}" enctype="multipart/form-data">

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
                                        <select name="distributor_id" class="farm">
                                            <option selected="" disabled="">Please Select a Distributor</option>
                                            @foreach($distributors as $distributor)
                                                <option value="{{ $distributor->id }}">
                                                    {{ $distributor->first_name }} {{ $distributor->last_name }}
                                                </option>
                                            @endforeach
                                        </select> <i></i> </label>
                                        @if($errors->first('distributor_id'))
                                            <em class="invalid">{{ $errors->first('distributor_id') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Coordinates &amp; Length
                        </header>
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
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="length" placeholder="Length" required>
                                    </label>
                                    @if($errors->first('length'))
                                        <em class="invalid">{{ $errors->first('length') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Brand &amp; Model
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Valley</option>
                                                <option value="2">Linjsey</option>
                                                <option value="3">BTL</option>
                                                <option value="4">Reinke</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('brand'))
                                            <em class="invalid">{{ $errors->first('brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">8000</option>
                                                <option value="2">8120</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('model'))
                                            <em class="invalid">{{ $errors->first('model') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Quantity of Arms
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="coa" class="farm">
                                            <option selected="" disabled="">Number</option>
                                                <option value="1">8 5/8</option>
                                                <option value="2">6 5/8</option>
                                                <option value="3">10</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('coa'))
                                            <em class="invalid">{{ $errors->first('coa') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="coa_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">Flexible</option>
                                                <option value="2">Metalic</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('coa_model'))
                                            <em class="invalid">{{ $errors->first('coa_model') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="ndd" placeholder="Number of Downspout Drops" required>
                                    </label>
                                    @if($errors->first('ndd'))
                                        <em class="invalid">{{ $errors->first('ndd') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="ddd" placeholder="Distance between downspout drops" required>
                                    </label>
                                    @if($errors->first('ddd'))
                                        <em class="invalid">{{ $errors->first('ddd') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Sprinklers
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="sprinkler_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">IWOB</option>
                                                <option value="2">LDN</option>
                                                <option value="3">Spray</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('sprinkler_model'))
                                            <em class="invalid">{{ $errors->first('sprinkler_model') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="sprikler_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Flat</option>
                                                <option value="2">Concave</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('sprikler_type'))
                                            <em class="invalid">{{ $errors->first('sprikler_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="sprinkler_counterweight" class="farm">
                                            <option selected="" disabled="">Conterweight</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('sprinkler_counterweight'))
                                            <em class="invalid">{{ $errors->first('sprinkler_counterweight') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Regulators
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="regulator_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Nelson</option>
                                                <option value="2">Sennizer</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('regulator_brand'))
                                            <em class="invalid">{{ $errors->first('regulator_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="regulator_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">10 PCI</option>
                                                <option value="2">15 PCI</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('regulator_type'))
                                            <em class="invalid">{{ $errors->first('regulator_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="regulator_range" class="farm">
                                            <option selected="" disabled="">Range</option>
                                                <option value="1">All Range</option>
                                                <option value="2">Low Flow</option>
                                                <option value="3">High Flow</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('regulator_range'))
                                            <em class="invalid">{{ $errors->first('regulator_range') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Wheels
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="wheel_size" class="farm">
                                            <option selected="" disabled="">Size</option>
                                                <option value="1">14x9x24</option>
                                                <option value="2">16x10x20</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('wheel_size'))
                                            <em class="invalid">{{ $errors->first('wheel_size') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Cantilever Overhang
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="co_length" class="farm">
                                            <option selected="" disabled="">Length</option>
                                                <option value="1">2</option>
                                                <option value="2">6</option>
                                                <option value="3">9</option>
                                                <option value="4">16</option>
                                                <option value="5">25</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('co_length'))
                                            <em class="invalid">{{ $errors->first('co_length') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="co_diameter" class="farm">
                                            <option selected="" disabled="">Diameter</option>
                                                <option value="1">3</option>
                                                <option value="2">4</option>
                                                <option value="3">5</option>
                                                <option value="4">6</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('co_diameter'))
                                            <em class="invalid">{{ $errors->first('co_diameter') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="co_drops" placeholder="Distance between downspout drops" required>
                                    </label>
                                    @if($errors->first('co_drops'))
                                        <em class="invalid">{{ $errors->first('co_drops') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Alignment
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="alignment" class="farm">
                                            <option selected="" disabled="">Alignment</option>
                                                <option value="1">Standard</option>
                                                <option value="2">Modified</option>
                                                <option value="3">Floating</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('alignment'))
                                            <em class="invalid">{{ $errors->first('alignment') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Rolling Train
                        </header>
                        <fieldset>
                            <label class="label">Reduce Engine</label>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="re_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Baldor</option>
                                                <option value="2">Emmerson</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('re_brand'))
                                            <em class="invalid">{{ $errors->first('re_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="re_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">High</option>
                                                <option value="2">Low</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('re_type'))
                                            <em class="invalid">{{ $errors->first('re_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="re_rpm" class="farm">
                                            <option selected="" disabled="">RPM</option>
                                                <option value="1">34</option>
                                                <option value="2">68</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('re_rpm'))
                                            <em class="invalid">{{ $errors->first('re_rpm') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="re_relation" class="farm">
                                            <option selected="" disabled="">Relationship</option>
                                                <option value="1">52:1</option>
                                                <option value="2">54:1</option>
                                                <option value="2">68:1</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('re_relation'))
                                            <em class="invalid">{{ $errors->first('re_relation') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <label class="label">Masa</label>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="masa_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Valley</option>
                                                <option value="2">Lindsey</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('masa_brand'))
                                            <em class="invalid">{{ $errors->first('masa_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="masa_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Mobile</option>
                                                <option value="3">Dual</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('masa_type'))
                                            <em class="invalid">{{ $errors->first('masa_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="masa_relation" class="farm">
                                            <option selected="" disabled="">Relationship</option>
                                                <option value="1">36 RPM</option>
                                                <option value="2">68 RPM</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('masa_relation'))
                                            <em class="invalid">{{ $errors->first('masa_relation') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Spreaders
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="spreader_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Mobile</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('spreader_type'))
                                            <em class="invalid">{{ $errors->first('spreader_type') }}</em>
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
                                        <input type="text" name="rotation_time" placeholder="Minimum Rotation Time" required>
                                    </label>
                                    @if($errors->first('rotation_time'))
                                        <em class="invalid">{{ $errors->first('rotation_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="sheet" placeholder="Sheet" required>
                                    </label>
                                    @if($errors->first('sheet'))
                                        <em class="invalid">{{ $errors->first('sheet') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="minimum_working_pressure" placeholder="Minimum Working Pressure" required>
                                    </label>
                                    @if($errors->first('minimum_working_pressure'))
                                        <em class="invalid">{{ $errors->first('minimum_working_pressure') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="input_voltage" placeholder="Input Voltage" required>
                                    </label>
                                    @if($errors->first('input_voltage'))
                                        <em class="invalid">{{ $errors->first('input_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="shut_down_low_voltage" placeholder="Shutting Down For Low Voltage" required>
                                    </label>
                                    @if($errors->first('shut_down_low_voltage'))
                                        <em class="invalid">{{ $errors->first('shut_down_low_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="minimum_voltage" placeholder="Minimum Voltage" required>
                                    </label>
                                    @if($errors->first('minimum_voltage'))
                                        <em class="invalid">{{ $errors->first('minimum_voltage') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="working_pressure" placeholder="Working Pressure" required>
                                    </label>
                                    @if($errors->first('working_pressure'))
                                        <em class="invalid">{{ $errors->first('working_pressure') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="shut_down_for_low_pressure" placeholder="Shutting Down For Low Pressure" required>
                                    </label>
                                    @if($errors->first('shut_down_for_low_pressure'))
                                        <em class="invalid">{{ $errors->first('shut_down_for_low_pressure') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="last_wheel_cycle" placeholder="Last Wheel Cycle" required>
                                    </label>
                                    @if($errors->first('last_wheel_cycle'))
                                        <em class="invalid">{{ $errors->first('last_wheel_cycle') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Timers
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="pressuring_time" placeholder="Pressuring Time" required>
                                    </label>
                                    @if($errors->first('pressuring_time'))
                                        <em class="invalid">{{ $errors->first('pressuring_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="pressurization_recon_time" placeholder="Pressurization re-connection time" required>
                                    </label>
                                    @if($errors->first('pressurization_recon_time'))
                                        <em class="invalid">{{ $errors->first('pressurization_recon_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="electical_conn_time" placeholder="Electrical Connection Time" required>
                                    </label>
                                    @if($errors->first('electical_conn_time'))
                                        <em class="invalid">{{ $errors->first('electical_conn_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="restart_time" placeholder="Restart Time" required>
                                    </label>
                                    @if($errors->first('restart_time'))
                                        <em class="invalid">{{ $errors->first('restart_time') }}</em>
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
                                        <select name="electrical_board_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">Basic</option>
                                                <option value="2">Std</option>
                                                <option value="3">Select</option>
                                                <option value="4">Select2</option>
                                                <option value="5">Pro</option>
                                                <option value="6">Pro2</option>
                                                <option value="7">Touch</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('electrical_board_model'))
                                            <em class="invalid">{{ $errors->first('electrical_board_model') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="electrical_board_contactors" placeholder="Contactors" required>
                                    </label>
                                    @if($errors->first('electrical_board_contactors'))
                                        <em class="invalid">{{ $errors->first('electrical_board_contactors') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="electrical_board_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Weg</option>
                                                <option value="2">Siemens</option>
                                                <option value="3">Lindsay</option>
                                                <option value="4">TL</option>
                                                <option value="5">Reinke</option>
                                                <option value="6">Valley</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('electrical_board_brand'))
                                            <em class="invalid">{{ $errors->first('electrical_board_brand') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="relay_board" placeholder="Relay Board" required>
                                    </label>
                                    @if($errors->first('relay_board'))
                                        <em class="invalid">{{ $errors->first('relay_board') }}</em>
                                    @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="protections" placeholder="Other Protections" required>
                                    </label>
                                    @if($errors->first('protections'))
                                        <em class="invalid">{{ $errors->first('protections') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="main_fuses" class="farm">
                                            <option selected="" disabled="">Main Fuses</option>
                                                <option value="1">10 amp</option>
                                                <option value="2">15 amp</option>
                                                <option value="3">20 amp</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('main_fuses'))
                                            <em class="invalid">{{ $errors->first('main_fuses') }}</em>
                                        @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="main_fuses_comment" placeholder="Main Fuses Comment" required>
                                    </label>
                                    @if($errors->first('main_fuses_comment'))
                                        <em class="invalid">{{ $errors->first('main_fuses_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="panel_fuses" class="farm">
                                            <option selected="" disabled="">Panel Fuses</option>
                                                <option value="1">10 amp</option>
                                                <option value="2">15 amp</option>
                                                <option value="3">20 amp</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('panel_fuses'))
                                            <em class="invalid">{{ $errors->first('panel_fuses') }}</em>
                                        @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="panel_fuses_comment" placeholder="Panel Fuses Comment" required>
                                    </label>
                                    @if($errors->first('panel_fuses_comment'))
                                        <em class="invalid">{{ $errors->first('panel_fuses_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="panel_code" placeholder="Panel Code" required>
                                    </label>
                                    @if($errors->first('panel_code'))
                                        <em class="invalid">{{ $errors->first('panel_code') }}</em>
                                    @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="lightning_arrester_code" placeholder="Lighting Arrester Code" required>
                                    </label>
                                    @if($errors->first('lightning_arrester_code'))
                                        <em class="invalid">{{ $errors->first('lightning_arrester_code') }}</em>
                                    @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="voltage_source_code" placeholder="Voltage Source Code" required>
                                    </label>
                                    @if($errors->first('voltage_source_code'))
                                        <em class="invalid">{{ $errors->first('voltage_source_code') }}</em>
                                    @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="pressure_sensor_code" placeholder="Pressure Sensor Code" required>
                                    </label>
                                    @if($errors->first('pressure_sensor_code'))
                                        <em class="invalid">{{ $errors->first('pressure_sensor_code') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                    </div>
                    <!-- end tab3 -->

	            </div>

                <footer>
                    <button type="submit" class="btn btn-primary">
                        Create Pivot
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
			// $('#type').on('change', function(){
			// 	if($('#type').val() == 1){
			// 		$('.distributor').prop('disabled', true);
			// 		$('.water').prop('disabled', true);
			// 		$('.farm').prop('disabled', false);
			// 	}else if($('#type').val() == 2){
			// 		$('.water').prop('disabled', true);
			// 		$('.farm').prop('disabled', true);
			// 		$('.distributor').prop('disabled', false);
			// 	}else{
			// 		$('.farm').prop('disabled', true);
			// 		$('.distributor').prop('disabled', true);
			// 		$('.water').prop('disabled', false);
			// 	}
			// });

            /*$("input[name='rolling_train']").on('change', function(){
                if($("input[name='rolling_train']:checked").val() == 1){
                    $("div.masa input").each(function(index){
                        $(this).prop('disabled', true);
                    });
                    $("div.reduce_engine input").each(function(index){
                        $(this).prop('disabled', false);
                    });
                }
                if($("input[name='rolling_train']:checked").val() == 2){
                    $("div.reduce_engine input").each(function(index){
                        $(this).prop('disabled', true);
                    });
                    $("div.masa input").each(function(index){
                        $(this).prop('disabled', false);
                    });
                }
            });*/
		});

	</script>

@stop