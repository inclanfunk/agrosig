@extends('layouts.master')

@section('content')

<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> Other Pages <span>>
			Forum Layout </span></h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<!-- row -->
<div class="row">

	<div class="col-sm-12">

		<div class="well">
			@foreach($sections as $section)
				<table class="table table-striped table-forum">
					<thead>
						<tr>
							<th colspan="2">{{ $section->name }}</th>
							<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Posts</th>
							<th class="hidden-xs hidden-sm" style="width: 200px;">Last Post</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($section->topics as $topic)
							<tr>
								<td class="text-center" style="width: 40px;"><i class="fa {{ $topic->icon }} fa-2x text-muted"></i></td>
								<td>
									<h4><a href="forum-topic.html">
										{{ $topic->name }}
									</a>
										<small>{{ $topic->description }}</small>
									</h4>
								</td>
								<td class="text-center hidden-xs hidden-sm">
									<a href="javascript:void(0);">1342</a>
								</td>
								<td class="hidden-xs hidden-sm">by 
									<a href="javascript:void(0);">John Doe</a>
									<br>
									<small><i>January 1, 2014</i></small>
								</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			@endforeach

		</div>
	</div>

</div>

<!-- end row -->

<!-- row -->

<div class="row">

	<!-- a blank row to get started -->

</div>

<!-- end row -->

@stop