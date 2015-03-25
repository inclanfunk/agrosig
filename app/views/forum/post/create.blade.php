@extends('layouts.master')

@section('content')


	<!-- row -->
	<div class="row">

		<div class="col-sm-12">

			<div class="well">

				<table class="table table-striped table-forum">
					<thead>
						<tr>
							<th colspan="2">{{ $topic->section->title }} > {{ $topic->title }} </th>
						</tr>
					</thead>
					<tbody>

						<!-- Post -->
						<tr>
							<td class="text-center"><a href="profile.html"><strong>{{ trans('forum.me') }}</strong></a></td>
							<td><em>{{ trans('forum.post.create.today') }}</em></td>
						</tr>
						<tr>
							<td class="text-center" style="width: 12%;">
							<div class="push-bit">
								<a href="profile.html">
									@if($user->photo)
                                    	<img src="{{URL::to('/photos/' . Sentry::getUser()->photo)}}" alt="demo user" width="50">
                                    @else
                                    	<img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50">
                                    @endif
								</a>
							</div><small>{{ Lang::choice('forum.number_of_posts', $user->posts->count(), [$user->posts->count()]) }}</small></td>
							<td>
								<div class="row">
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
											<input type="text" class="form-control" placeholder="{{ trans('forum.post.create.title') }}" name='title'>
										</div>
									</div>
								</div>

								<p></p>

								<input type="hidden" name="topic_id" value="{{ Input::get('topic_id') }}">

								<div id="forumPost"></div>
								<em id="error" class="invalid hidden"><p>{{ trans('forum.create.required') }}</p></em>
									
								<button id="post" class="btn btn-primary margin-top-10">
									{{ trans('forum.post.create.post') }}
								</button>
							</td>
						</tr>
						<!-- end Post -->

					</tbody>
				</table>

			</div>
		</div>

	</div>

	<!-- end row -->

@stop

@section('custom-js')

	<script src="{{ URL::to('js/plugin/summernote/summernote.min.js') }}"></script>

	<script type="text/javascript">
		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			$('#forumPost').summernote({
				height : 180,
				focus : false,
				tabsize : 2
			});

			$('#post').on('click', function(e){
				if($('input[name="title"]').val() != '' && $('#forumPost').code()  != '' && $('input[name="topic_id"]').val()  != ''){
					var data = {
						title: $('input[name="title"]').val(),
						body: $('#forumPost').code(),
						topic_id: $('input[name="topic_id"]').val(),
					};

					$.ajax({
						type: "POST",
						url: '/posts',
						data: data,
						success: function(response){
							window.location.href = '/posts/' + response.id;
						},
					});
				}else{
					$('#error').removeClass('hidden');
				}
			});
			
		})

	</script>

	<!-- Your GOOGLE ANALYTICS CODE Below -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();

	</script>

@stop