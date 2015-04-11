@extends('layouts.master')

@section('content')
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">

	</div>
	<!-- end col -->


</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Your Orders</h2>
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

						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
		                            <th data-class="expand">Number</th>
		                            <th data-hide="phone">Farm</th>
		                            <th data-hide="phone,tablet">Total Cost</th>
		                            <th>View</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
			                        <tr>
			                            <td>{{ $order->order_number }}</td>
			                            <td>{{ $order->farm->name }}</td>
			                            <td>{{ $order->total_cost }}</td>
			                            <td>
			                                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#order-{{ $order->id }}">View Order</a>
			                            </td>
			                        </tr>
		                        @endforeach
							</tbody>
						</table>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->
		</article>
		<!-- new end widget -->
	</div>
	<!-- end row -->
</section>
<!-- end section -->

@foreach($orders as $order)

	<!-- Modal -->
	<div class="modal fade" id="order-{{ $order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Order Details</h4>
				</div>
				<div class="modal-body">

					<table class="table table-condensed">
						<thead>
							<th>
								Key
							</th>
							<th>
								Value
							</th>
						</thead>
						<tbody>
							<tr>
								<td>Distributor</td>
								<td>{{ $order->company->name }}</td>
							</tr>
							<tr>
								<td>Pivot Name</td>
								<td>{{ $order->pivot->name }}</td>
							</tr>
							<tr>
								<td>Waterpump Name</td>
								<td>{{ $order->waterpumpEquip->name }}</td>
							</tr>
							<tr>
								<td>Number</td>
								<td>{{ $order->order_number }}</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>{{ $order->date->format('y-m-d') }} ({{ $order->date->diffForHumans() }})</td>
							</tr>
							<tr>
								<td>Pivot Task</td>
								<td>{{ $order->pivot_task }}</td>
							</tr>
							<tr>
								<td>Pivot Catergory</td>
								<td>{{ $order->pivot_category }}</td>
							</tr>
							<tr>
								<td>Gear Train</td>
								<td>{{ $order->gear_train }}</td>
							</tr>
							<tr>
								<td>Electricity</td>
								<td>{{ $order->electricity }}</td>
							</tr>
							<tr>
								<td>Sprinkling</td>
								<td>{{ $order->sprinkling }}</td>
							</tr>
							<tr>
								<td>Pivot Cost</td>
								<td>{{ $order->pivot_cost }}</td>
							</tr>
							<tr>
								<td>Waterpump Task</td>
								<td>{{ $order->waterpump_task }}</td>
							</tr>
							<tr>
								<td>Waterpump Catergory</td>
								<td>{{ $order->waterpump_category }}</td>
							</tr>
							<tr>
								<td>Motor</td>
								<td>{{ $order->motor }}</td>
							</tr>
							<tr>
								<td>Electrical Board</td>
								<td>{{ $order->electrical_board }}</td>
							</tr>
							<tr>
								<td>Waterpump</td>
								<td>{{ $order->waterpump }}</td>
							</tr>
							<tr>
								<td>Waterpump Cost</td>
								<td>{{ $order->waterpump_cost }}</td>
							</tr>
							<tr>
								<td>Total Cost</td>
								<td>{{ $order->total_cost }}</td>
							</tr>
						</tbody>

					</table>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@endforeach

@stop


@section('custom-js')

<!-- PAGE RELATED PLUGIN(S) -->
		<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			/* // DOM Position key index //

			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class

			Also see: http://legacy.datatables.net/usage/features
			*/

			/* BASIC ;*/
				var responsiveHelper_dt_basic = undefined;
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;

				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};

				$('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
					"preDrawCallback" : function() {
						// Initialize the responsive datatables helper once.
						if (!responsiveHelper_dt_basic) {
							responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
						}
					},
					"rowCallback" : function(nRow) {
						responsiveHelper_dt_basic.createExpandIcon(nRow);
					},
					"drawCallback" : function(oSettings) {
						responsiveHelper_dt_basic.respond();
					}
				});

			/* END BASIC */

			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}

		    });


		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();

		    } );
		    /* END COLUMN FILTER */

		    $('header h2').text('Your Orders');



		})

		</script>
@stop
