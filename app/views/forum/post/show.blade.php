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
											{{ trans('forum.me') }}
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
												{{ trans('forum.me') }}
											@else
												{{ $reply->user->first_name  }} {{ $reply->user->last_name  }}
											@endif
										</strong>
									</a>
								</td>
								<td>
									<em><span title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span></em>
								</td>
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
									</div><small>{{ $post->user->posts->count() }} Posts</small>
								</td>
								<td>
									{{ $reply->body }}
								</td>
							</tr>
							<!-- end Post -->

						@endforeach

						<!-- Post -->
						<tr>
							<td class="text-center"><a href="profile.html"><strong>{{ trans('forum.me') }}</strong></a></td>
							<td><em>{{ trans('forum.post.show.now') }}</em></td>
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
							</div><small>{{ Lang::choice('forum.number_of_posts', $user->posts->count(), [$user->posts->count()]) }}</small></td>
							<td>
								<input type="hidden" name="post_id" value="{{ $post->id }}">

								<div id="forumReply"></div>
								<em id="error" class="invalid hidden"><p>{{ trans('forum.post.show.required') }}</p></em>
									
								<button id="reply" class="btn btn-primary margin-top-10">
									{{ trans('forum.post.show.reply') }}
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Progress</h4>
      </div>
      <div class="modal-body">
      	<div class="progress">
			<div aria-valuenow="0" style="width: 0%;" class="progress-bar bg-color-teal" aria-valuetransitiongoal="0">0%</div>
		</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
				tabsize : 2,
				onImageUpload: function(files, editor, welEditable) {
	                sendFile(files[0], editor, welEditable);
	            }
			});

			function sendFile(file, editor, welEditable) {
	            data = new FormData();
	            data.append("file", file);
	            $.ajax({
	                data: data,
	                type: "POST",
	                xhr: function() {
		                var myXhr = $.ajaxSettings.xhr();
		                if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
		                return myXhr;
		            },
	                url: "/forum/upload",
	                cache: false,
	                contentType: false,
	                processData: false,
	                success: function(url) {
	                	console.log(url);
	                    editor.insertImage(welEditable, url);
	                }
	            });
	            $('#myModal').modal({ show: true });
	        }

	        function progressHandlingFunction(e){
			    if(e.lengthComputable){
			        var progress = $('.progress > div').attr('aria-valuetransitiongoal');
			        $('.progress > div').attr('aria-valuetransitiongoal', Math.round(e.loaded / e.total * 100));
			        $('.progress > div').attr('aria-valuenow', Math.round(e.loaded / e.total * 100));
			        $('.progress > div').width(Math.round(e.loaded / e.total * 100) + '%');
			        $('.progress > div').text(Math.round(e.loaded / e.total * 100) + '%');
			    }
			}

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