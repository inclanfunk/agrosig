@extends('layouts.master')

@section('content')

	<!-- Bread crumb is created dynamically -->
	<!-- row -->
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		    <!-- sparks -->
		    <ul id="sparks">

		        <li class="sparks-info">
		            <a href="{{ URL::to('posts/create') . '?topic_id=' . $topic->id }}" class="btn btn-success">Create A New Post</a>
		        </li>

		    </ul>
		    <!-- end sparks -->
		</div>
		<!-- end col -->

	</div>
	<!-- end row -->
	
	<!-- row -->
	<div class="row">
	
		<div class="col-sm-12">
	
			<div class="well">
	
				<table class="table table-striped table-forum">
					<thead>
						<tr>
							<th colspan="2"><a href="{{ URL::to('forum') }}"> Forum </a> > {{ $topic->title }}</th>
							<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Replies</th>
							<th class="hidden-xs hidden-sm" style="width: 200px;">Last Reply</th>
						</tr>
					</thead>
					<tbody>

						@if(!$topic->posts->count())
							<tr>
								<td colspan="3" class="text-center"><em>No posts yet! <br />Be the first one to post!</em></td>
							</tr>
						@else

							@foreach($topic->posts as $post)
								<tr>
									<td colspan="2">
										<h4><a href="{{ URL::to('/posts', $post->id) }}">
											{{ $post->title }}
										</a>
											<small><a href="#">{{ $post->user->first_name  }} {{ $post->user->last_name  }}</a> <em><span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span></em></small>
										</h4>
									</td>
									<td class="text-center hidden-xs hidden-sm">
										<a href="javascript:void(0);">{{ $post->replies->count() }}</a>
									</td>
									<td class="hidden-xs hidden-sm">by 
										<a href="javascript:void(0);">
											@if(!$post->replies->count())
												N/A
											@else
												{{ $post->replies->last()->user->first_name }} {{ $post->replies->last()->user->last_name }}
											@endif
										</a>
										<br>
										<small><i>
											@if(!$post->replies->count())
												N/A
											@else
												<span title="{{ $post->replies->last()->created_at }}">{{ $post->replies->last()->created_at->diffForHumans() }}</span>
											@endif
										</i></small>
									</td>
								</tr>
							@endforeach	

						@endif					
						
					</tbody>
				</table>
	
				<div class="text-center">
	                <ul class="pagination pagination-sm">
	                    <li class="disabled"><a href="javascript:void(0);">Prev</a></li>
	                    <li class="active"><a href="javascript:void(0);">1</a></li>
	                    <li><a href="javascript:void(0);">2</a></li>
	                    <li><a href="javascript:void(0);">3</a></li>
	                    <li><a href="javascript:void(0);">...</a></li>
	                    <li><a href="javascript:void(0);">99</a></li>
	                    <li><a href="javascript:void(0);">Next</a></li>
	                </ul>
	            </div>
	
			</div>
		</div>
	
	</div>
	
	<!-- end row -->

@stop

@section('custom-js')

	<script type="text/javascript">

	</script>

@stop