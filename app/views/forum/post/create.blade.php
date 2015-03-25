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
			<div aria-valuenow="25" style="width: 25%;" class="progress-bar bg-color-teal" aria-valuetransitiongoal="25">25%</div>
		</div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>

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
	                    editor.insertImage(welEditable, url);
	                }
	            });
		    	$('#myModal').modal({ show: true });
	        }

	        

	        function progressHandlingFunction(e){
	        	console.log(e);
			    if(e.lengthComputable){
			        var progress = $('.progress > div').attr('aria-valuetransitiongoal');
			        $('.progress > div').attr('aria-valuetransitiongoal', e.loaded / e.total * 100);
			        $('.progress > div').attr('aria-valuenow', e.loaded / e.total * 100);
			        $('.progress > div').width(e.loaded / e.total * 100 + '%');
			        $('.progress > div').text(e.loaded / e.total * 100 + '%');


			        if (e.loaded == e.total) {
			        	$('#myModal').modal({ show: false });
			         //    $('.progress > div').attr('aria-valuetransitiongoal', 0);
				        // $('.progress > div').attr('aria-valuenow', 0);
				        // $('.progress > div').width(0 + '%');
				        // $('.progress > div').text(0 + '%');
			        }
			    }
			}

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
@stop