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
							<th colspan="2">{{ $section->title }}</th>
							<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Posts</th>
							<th class="hidden-xs hidden-sm" style="width: 200px;">Last Post</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($section->topics as $topic)
							<tr>
								<td class="text-center" style="width: 40px;"><i class="fa {{ $topic->icon }} fa-2x text-muted"></i></td>
								<td>
									<h4><a href="{{ URL::to('forum/topics', $topic->id) }}">
										{{ $topic->title }}
									</a>
										<small>{{ $topic->description }}</small>
									</h4>
								</td>
								<td class="text-center hidden-xs hidden-sm">
									<a href="javascript:void(0);">{{ $topic->posts->count() }}</a>
								</td>
								<td class="hidden-xs hidden-sm">by 
									<a href="javascript:void(0);">
										@if(!$topic->posts->count())
											N/A
										@else
											{{ $topic->posts->last()->user->first_name }} {{ $topic->posts->last()->user->last_name }}
										@endif
									</a>
									<br>
									<small><i>
										@if(!$topic->posts->count())
											N/A
										@else
											<span title="{{ $topic->posts->last()->created_at }}">{{ $topic->posts->last()->created_at->diffForHumans() }}</span>
										@endif
									</i></small>
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