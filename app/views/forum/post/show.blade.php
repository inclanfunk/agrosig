@extends('layouts.master')

@section('content')

	<!-- row -->
	<div class="row">

		<div class="col-sm-12">

			<div class="well">

				<table class="table table-striped table-forum">
					<thead>
						<tr>
							<th colspan="2"><a href="{{ URL::to('/forum') }}">{{ $post->topic->section->title }}</a> > <a href="{{ URL::to('/forum/topics/' . $post->topic->id) }}">{{ $post->topic->title }}</a> > {{ $post->title }} </th>
						</tr>
					</thead>
					<tbody>

						<!-- Post -->
						<tr>
							<td class="text-center">
								<a href="profile.html">
									<strong>
										@if($post->user->id == Sentry::getUser()->id)
											Me
										@else
											{{ $post->user->first_name  }} {{ $post->user->last_name  }}
										@endif
									</strong>
								</a>
							</td>
							<td><em><span title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span></em></td>
						</tr>
						<tr>
							<td class="text-center" style="width: 12%;">
							<div class="push-bit">
								<a href="#"> 
									@if($post->user->photo)
                                    	<img src="{{URL::to('/photos/' . $post->user->photo)}}" alt="demo user" width="50">
                                    @else
                                    	<img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50">
                                    @endif
								</a>
							</div><small>{{ $post->user->posts->count() }} Posts</small></td>
							<td>
								{{ $post->body }}
							</td>
						</tr>
						<!-- end Post -->

						@foreach($replies as $reply)

							<!-- Post -->
							<tr>
								<td class="text-center">
									<a href="profile.html">
										<strong>
											@if($reply->user->id == Sentry::getUser()->id)
												Me
											@else
												{{ $reply->user->first_name  }} {{ $reply->user->last_name  }}
											@endif
										</strong>
									</a>
								</td>
								<td><em><span title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span></em></td>
							</tr>
							<tr>
								<td class="text-center" style="width: 12%;">
								<div class="push-bit">
									<a href="#"> 
										@if($reply->user->photo)
	                                    	<img src="{{URL::to('/photos/' . $reply->user->photo)}}" alt="demo user" width="50">
	                                    @else
	                                    	<img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50">
	                                    @endif
									</a>
								</div><small>{{ $post->user->posts->count() }} Posts</small></td>
								<td>
									{{ $reply->body }}
								</td>
							</tr>
							<!-- end Post -->

						@endforeach

						<!-- Post -->
						<tr>
							<td class="text-center"><a href="profile.html"><strong>Me</strong></a></td>
							<td><em>Now</em></td>
						</tr>
						<tr>
							<td class="text-center" style="width: 12%;">
							<div class="push-bit">
								<a href="profile.html">
									@if($user->photo)
                                    	<img src="{{URL::to('/photos/' . $user->photo)}}" alt="demo user" width="50">
                                    @else
                                    	<img src=" {{URL::to('/img/avatar.png') }} " alt="demo user" width="50">
                                    @endif
								</a>
							</div><small>{{ $post->user->posts->count() }} Posts</small></td>
							<td>
								<input type="hidden" name="post_id" value="{{ $post->id }}">

								<div id="forumReply"></div>
								<em id="error" class="invalid hidden"><p>The Reply Body is requried!</p></em>
									
								<button id="reply" class="btn btn-primary margin-top-10">
									Reply
								</button>
							</td>
						</tr>
						<!-- end Post -->

					</tbody>
				</table>

				<div class="text-center">
					{{$replies->links()}}
				</div>

			</div>
		</div>

	</div>

	<!-- end row -->

@stop

@section('custom-js')

	<script src="{{ URL::to('js/plugin/summernote/summernote.min.js') }}"></script>

	<script type="text/javascript">
		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		// Declaring the post id in JS for further events
		{{ 'var post_id = ' . $post->id }}

		$(document).ready(function() {

			pageSetUp();

			$('#forumReply').summernote({
				height : 180,
				focus : false,
				tabsize : 2
			});

			$('#reply').on('click', function(e){
				if($('#forumReply').code() != '' && $('input[name="post_id"]').val()  != ''){
					var data = {
						body: $('#forumReply').code(),
						post_id: $('input[name="post_id"]').val(),
					};

					$.ajax({
						type: "POST",
						url: '/replies',
						data: data,
						success: function(response){
							window.location.reload();
						},
					});
				}else{
					$('#error').removeClass('hidden');
				}
			});

			// Needs work!

			var pusher = new Pusher('082bab423e2a8be3da2a');
			var reply = pusher.subscribe('reply');
			reply.bind('new_reply', function(response){
				if(post_id == response[0].post_id){
					console.log(5);
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