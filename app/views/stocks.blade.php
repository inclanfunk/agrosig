@extends('layouts.master')

@section('content')

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<h2>All Companies</h2>
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

						<table id="dt_basic" class="table table-striped table-bstocked table-hover" width="100%">
							<thead>			                
								<tr>
		                            <th data-class="expand">Product</th>
		                            <th data-hide="phone">Dock</th>
		                            <th data-hide="phone,tablet">Delivery</th>
		                            <th data-hide="phone,tablet">Adjusted V. of Yesterday</th>
		                            <th data-hide="phone,tablet">Ajusted V.</th>
		                            <th data-hide="phone,tablet">Diff b/w Last V. and Starting V.</th>
		                            <th>View</th>
								</tr>
							</thead>
							<tbody>
								@foreach($stocks as $stock)
			                        <tr>
			                            <td>{{ $stock->PRODUCTO }}</td>
			                            <td>{{ $stock->PUERTO_ABREVIADO }}</td>
			                            <td>{{ $stock->ENTREGA }}</td>
			                            <td>{{ $stock->PRECIO_AJUSTE_ANTERIOR }}</td>
			                            <td>{{ $stock->PRECIO_AJUSTE }}</td>
			                            <td>{{ $stock->Dif }}</td>
			                            <td>
			                                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#stock-{{ $stock->id }}">View Stock</a>
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

@foreach($stocks as $stock)

	<!-- Modal -->
	<div class="modal fade" id="stock-{{ $stock->id }}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Stock Details</h4>
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
								<td>Date</td>
								<td>{{ $stock->fecha }}</td>
							</tr>
							<tr>
								<td>Product</td>
								<td>{{ $stock->PRODUCTO }}</td>
							</tr>
							<tr>
								<td>Dock</td>
								<td>{{ $stock->PUERTO_ABREVIADO }}</td>
							</tr>
							<tr>
								<td>Delivery</td>
								<td>{{ $stock->ENTREGA }}</td>
							</tr>
							<tr>
								<td>Ajusted Value</td>
								<td>{{ $stock->PRECIO_AJUSTE }}</td>
							</tr>
							<tr>
								<td>Maximum Value</td>
								<td>{{ $stock->MAXIMO_OPERADO }}</td>
							</tr>
							<tr>
								<td>Minimum Value</td>
								<td>{{ $stock->MINIMO_OPERADO }}</td>
							</tr>
							<tr>
								<td>First Value</td>
								<td>{{ $stock->PRIMER_OPERADO }}</td>
							</tr>
							<tr>
								<td>Last Value</td>
								<td>{{ $stock->ULTIMO_OPERADO }}</td>
							</tr>
							<tr>
								<td>Sealed Contract</td>
								<td>{{ $stock->OI }}</td>
							</tr>
							<tr>
								<td>Sealed Volume</td>
								<td>{{ $stock->OI_VOL }}</td>
							</tr>
							<tr>
								<td>Currency</td>
								<td>{{ $stock->MONEDA }}</td>
							</tr>
							<tr>
								<td>Operation Type</td>
								<td>{{ $stock->TIPO_OPERACION }}</td>
							</tr>
							<tr>
								<td>Difference in Sealed Contract</td>
								<td>{{ $stock->DIF_OI }}</td>
							</tr>
							<tr>
								<td>Difference in Sealed Volume</td>
								<td>{{ $stock->DIF_OI_VOL }}</td>
							</tr>
							<tr>
								<td>Ajusted Value of Yesterday</td>
								<td>{{ $stock->PRECIO_AJUSTE_ANTERIOR }}</td>
							</tr>
							<tr>
								<td>Difference b/w Last Value and Starting Value</td>
								<td>{{ $stock->Dif }}</td>
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
				var responsiveHelper_datatable_col_restock = undefined;
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


		})

		</script>
@stop
