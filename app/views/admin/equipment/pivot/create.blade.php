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
                        <header>
                            Coordinates &amp; Radius
                        </header>
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
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="radius" placeholder="Radius" required>
                                    </label>
                                    @if($errors->first('radius'))
                                        <em class="invalid">{{ $errors->first('radius') }}</em>
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
                        <header>
                            Brand &amp; Model
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Valley</option>
                                                <option value="2">Linjsey</option>
                                                <option value="3">BTL</option>
                                                <option value="4">Reinke</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_brand'))
                                            <em class="invalid">{{ $errors->first('g_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">8000</option>
                                                <option value="2">8120</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_model'))
                                            <em class="invalid">{{ $errors->first('g_model') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Quantity of Arms
                        </header>
                        <fieldset>
                            <label class="label">Arms 10</label>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_10_quantity" placeholder="Quantity" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_10_quantity'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_10_quantity') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_10_length" placeholder="Length" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_10_length'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_10_length') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_10_number_of_drops" placeholder="Number of Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_10_number_of_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_10_number_of_drops') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_10_distance_between_drops" placeholder="Distance Between Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_10_distance_between_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_10_distance_between_drops') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <label class="label">Arms 8 5/8</label>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_8_5by8_quantity" placeholder="Quantity" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_8_5by8_quantity'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_8_5by8_quantity') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_8_5by8_length" placeholder="Length" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_8_5by8_length'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_8_5by8_length') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_8_5by8_number_of_drops" placeholder="Number of Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_8_5by8_number_of_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_8_5by8_number_of_drops') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_8_5by8_distance_between_drops" placeholder="Distance Between Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_8_5by8_distance_between_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_8_5by8_distance_between_drops') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <label class="label">Arms 6 5/8</label>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_6_5by8_quantity" placeholder="Quantity" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_6_5by8_quantity'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_6_5by8_quantity') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrows"></i>
                                        <input type="number" name="g_quantity_of_arms_6_5by8_length" placeholder="Length" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_6_5by8_length'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_6_5by8_length') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_6_5by8_number_of_drops" placeholder="Number of Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_6_5by8_number_of_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_6_5by8_number_of_drops') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_quantity_of_arms_6_5by8_distance_between_drops" placeholder="Distance Between Drops" required>
                                    </label>
                                    @if($errors->first('g_quantity_of_arms_6_5by8_distance_between_drops'))
                                        <em class="invalid">{{ $errors->first('g_quantity_of_arms_6_5by8_distance_between_drops') }}</em>
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
                                        <select name="g_sprinkler_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">IWOB</option>
                                                <option value="2">LDN</option>
                                                <option value="3">Spray</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_sprinkler_model'))
                                            <em class="invalid">{{ $errors->first('g_sprinkler_model') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_sprikler_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Flat</option>
                                                <option value="2">Concave</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_sprikler_type'))
                                            <em class="invalid">{{ $errors->first('g_sprikler_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_sprinkler_counterweight" class="farm">
                                            <option selected="" disabled="">Conterweight</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_sprinkler_counterweight'))
                                            <em class="invalid">{{ $errors->first('g_sprinkler_counterweight') }}</em>
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
                                        <select name="g_regulator_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Nelson</option>
                                                <option value="2">Sennizer</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_regulator_brand'))
                                            <em class="invalid">{{ $errors->first('g_regulator_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_regulator_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">10 PCI</option>
                                                <option value="2">15 PCI</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_regulator_type'))
                                            <em class="invalid">{{ $errors->first('g_regulator_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_regulator_range" class="farm">
                                            <option selected="" disabled="">Range</option>
                                                <option value="1">All Range</option>
                                                <option value="2">Low Flow</option>
                                                <option value="3">High Flow</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_regulator_range'))
                                            <em class="invalid">{{ $errors->first('g_regulator_range') }}</em>
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
                                        <select name="g_wheel_size" class="farm">
                                            <option selected="" disabled="">Size</option>
                                                <option value="1">14x9x24</option>
                                                <option value="2">16x10x20</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_wheel_size'))
                                            <em class="invalid">{{ $errors->first('g_wheel_size') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <header>
                            Overhang
                        </header>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_overhang_length" class="farm">
                                            <option selected="" disabled="">Length</option>
                                                <option value="1">2</option>
                                                <option value="2">6</option>
                                                <option value="3">9</option>
                                                <option value="4">16</option>
                                                <option value="5">25</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_overhang_length'))
                                            <em class="invalid">{{ $errors->first('g_overhang_length') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_overhang_diameter" class="farm">
                                            <option selected="" disabled="">Diameter</option>
                                                <option value="1">3</option>
                                                <option value="2">4</option>
                                                <option value="3">5</option>
                                                <option value="4">6</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_overhang_diameter'))
                                            <em class="invalid">{{ $errors->first('g_overhang_diameter') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-arrow-circle-down"></i>
                                        <input type="number" name="g_overhang_distance_between_drops" placeholder="Distance between downspout drops" required>
                                    </label>
                                    @if($errors->first('g_overhang_distance_between_drops'))
                                        <em class="invalid">{{ $errors->first('g_overhang_distance_between_drops') }}</em>
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
                                        <select name="g_alignment" class="farm">
                                            <option selected="" disabled="">Alignment</option>
                                                <option value="1">Standard</option>
                                                <option value="2">Modified</option>
                                                <option value="3">Floating</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_alignment'))
                                            <em class="invalid">{{ $errors->first('g_alignment') }}</em>
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
                                        <select name="g_rolling_train_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Baldor</option>
                                                <option value="2">Emmerson</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_rolling_train_brand'))
                                            <em class="invalid">{{ $errors->first('g_rolling_train_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_rolling_train_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">High</option>
                                                <option value="2">Low</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_rolling_train_type'))
                                            <em class="invalid">{{ $errors->first('g_rolling_train_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_rolling_train_rpm" class="farm">
                                            <option selected="" disabled="">RPM</option>
                                                <option value="1">34</option>
                                                <option value="2">68</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_rolling_train_rpm'))
                                            <em class="invalid">{{ $errors->first('g_rolling_train_rpm') }}</em>
                                        @endif
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="g_rolling_train_relationship" class="farm">
                                            <option selected="" disabled="">Relationship</option>
                                                <option value="1">52:1</option>
                                                <option value="2">54:1</option>
                                                <option value="2">68:1</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_rolling_train_relationship'))
                                            <em class="invalid">{{ $errors->first('g_rolling_train_relationship') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <label class="label">Masa</label>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_masa_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Valley</option>
                                                <option value="2">Lindsey</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_masa_brand'))
                                            <em class="invalid">{{ $errors->first('g_masa_brand') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_masa_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Mobile</option>
                                                <option value="3">Dual</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_masa_type'))
                                            <em class="invalid">{{ $errors->first('g_masa_type') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="g_masa_relation" class="farm">
                                            <option selected="" disabled="">Relationship</option>
                                                <option value="1">36 RPM</option>
                                                <option value="2">68 RPM</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_masa_relation'))
                                            <em class="invalid">{{ $errors->first('g_masa_relation') }}</em>
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
                                        <select name="g_spreader_type" class="farm">
                                            <option selected="" disabled="">Type</option>
                                                <option value="1">Fixed</option>
                                                <option value="2">Mobile</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('g_spreader_type'))
                                            <em class="invalid">{{ $errors->first('g_spreader_type') }}</em>
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
                                        <input type="text" name="s_rotation_time" placeholder="Minimum Rotation Time" required>
                                    </label>
                                    @if($errors->first('s_rotation_time'))
                                        <em class="invalid">{{ $errors->first('s_rotation_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_sheet" placeholder="Sheet" required>
                                    </label>
                                    @if($errors->first('s_sheet'))
                                        <em class="invalid">{{ $errors->first('s_sheet') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_minimum_working_pressure" placeholder="Minimum Working Pressure" required>
                                    </label>
                                    @if($errors->first('s_minimum_working_pressure'))
                                        <em class="invalid">{{ $errors->first('s_minimum_working_pressure') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_input_voltage" placeholder="Input Voltage" required>
                                    </label>
                                    @if($errors->first('s_input_voltage'))
                                        <em class="invalid">{{ $errors->first('s_input_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_shut_down_low_voltage" placeholder="Shutting Down For Low Voltage" required>
                                    </label>
                                    @if($errors->first('s_shut_down_low_voltage'))
                                        <em class="invalid">{{ $errors->first('s_shut_down_low_voltage') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_minimum_voltage" placeholder="Minimum Voltage" required>
                                    </label>
                                    @if($errors->first('s_minimum_voltage'))
                                        <em class="invalid">{{ $errors->first('s_minimum_voltage') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_working_pressure" placeholder="Working Pressure" required>
                                    </label>
                                    @if($errors->first('s_working_pressure'))
                                        <em class="invalid">{{ $errors->first('s_working_pressure') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_shut_down_for_low_pressure" placeholder="Shutting Down For Low Pressure" required>
                                    </label>
                                    @if($errors->first('s_shut_down_for_low_pressure'))
                                        <em class="invalid">{{ $errors->first('s_shut_down_for_low_pressure') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_last_wheel_cycle" placeholder="Last Wheel Cycle" required>
                                    </label>
                                    @if($errors->first('s_last_wheel_cycle'))
                                        <em class="invalid">{{ $errors->first('s_last_wheel_cycle') }}</em>
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
                                        <input type="text" name="s_pressuring_time" placeholder="Pressuring Time" required>
                                    </label>
                                    @if($errors->first('s_pressuring_time'))
                                        <em class="invalid">{{ $errors->first('s_pressuring_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_pressurization_recon_time" placeholder="Pressurization re-connection time" required>
                                    </label>
                                    @if($errors->first('s_pressurization_recon_time'))
                                        <em class="invalid">{{ $errors->first('s_pressurization_recon_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_electical_conn_time" placeholder="Electrical Connection Time" required>
                                    </label>
                                    @if($errors->first('s_electical_conn_time'))
                                        <em class="invalid">{{ $errors->first('s_electical_conn_time') }}</em>
                                    @endif
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="s_restart_time" placeholder="Restart Time" required>
                                    </label>
                                    @if($errors->first('s_restart_time'))
                                        <em class="invalid">{{ $errors->first('s_restart_time') }}</em>
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
                                        <select name="eb_model" class="farm">
                                            <option selected="" disabled="">Model</option>
                                                <option value="1">Basic</option>
                                                <option value="2">Std</option>
                                                <option value="3">Select</option>
                                                <option value="4">Select2</option>
                                                <option value="5">Pro</option>
                                                <option value="6">Pro2</option>
                                                <option value="7">Touch</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_model'))
                                            <em class="invalid">{{ $errors->first('eb_model') }}</em>
                                        @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_contactors" placeholder="Contactors" required>
                                    </label>
                                    @if($errors->first('eb_contactors'))
                                        <em class="invalid">{{ $errors->first('eb_contactors') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="select">
                                        <select name="eb_brand" class="farm">
                                            <option selected="" disabled="">Brand</option>
                                                <option value="1">Weg</option>
                                                <option value="2">Siemens</option>
                                                <option value="3">Lindsay</option>
                                                <option value="4">TL</option>
                                                <option value="5">Reinke</option>
                                                <option value="6">Valley</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_brand'))
                                            <em class="invalid">{{ $errors->first('eb_brand') }}</em>
                                        @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_relay_board" placeholder="Relay Board" required>
                                    </label>
                                    @if($errors->first('eb_relay_board'))
                                        <em class="invalid">{{ $errors->first('eb_relay_board') }}</em>
                                    @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_protections" placeholder="Other Protections" required>
                                    </label>
                                    @if($errors->first('eb_protections'))
                                        <em class="invalid">{{ $errors->first('eb_protections') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="eb_main_fuses" class="farm">
                                            <option selected="" disabled="">Main Fuses</option>
                                                <option value="1">10 amp</option>
                                                <option value="2">12 amp</option>
                                                <option value="3">15 amp</option>
                                                <option value="4">17 amp</option>
                                                <option value="5">20 amp</option>
                                                <option value="6">25 amp</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_main_fuses'))
                                            <em class="invalid">{{ $errors->first('eb_main_fuses') }}</em>
                                        @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_main_fuses_comment" placeholder="Main Fuses Comment" required>
                                    </label>
                                    @if($errors->first('eb_main_fuses_comment'))
                                        <em class="invalid">{{ $errors->first('eb_main_fuses_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select">
                                        <select name="eb_panel_fuses" class="farm">
                                            <option selected="" disabled="">Panel Fuses</option>
                                                <option value="1">2 amp</option>
                                                <option value="2">4 amp</option>
                                                <option value="3">5 amp</option>
                                        </select> <i></i> </label>
                                        @if($errors->first('eb_panel_fuses'))
                                            <em class="invalid">{{ $errors->first('eb_panel_fuses') }}</em>
                                        @endif
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_panel_fuses_comment" placeholder="Panel Fuses Comment" required>
                                    </label>
                                    @if($errors->first('eb_panel_fuses_comment'))
                                        <em class="invalid">{{ $errors->first('eb_panel_fuses_comment') }}</em>
                                    @endif
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_lightning_arrester_code" placeholder="Lighting Arrester Code" required>
                                    </label>
                                    @if($errors->first('eb_lightning_arrester_code'))
                                        <em class="invalid">{{ $errors->first('eb_lightning_arrester_code') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_voltage_source_code" placeholder="Voltage Source Code" required>
                                    </label>
                                    @if($errors->first('eb_voltage_source_code'))
                                        <em class="invalid">{{ $errors->first('eb_voltage_source_code') }}</em>
                                    @endif
                                </section>
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-append fa fa-gear"></i>
                                        <input type="text" name="eb_pressure_sensor_code" placeholder="Pressure Sensor Code" required>
                                    </label>
                                    @if($errors->first('eb_pressure_sensor_code'))
                                        <em class="invalid">{{ $errors->first('eb_pressure_sensor_code') }}</em>
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