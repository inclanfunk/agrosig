@extends('layouts.master')


@section('content')

<style type="text/css">

  img#photo:hover:before{
    font-family: 'FontAwesome';
    content: '\f01a';
  }

</style>


<div class="row">

        <div class="col-sm-12">

            <div class="well well-sm">

                <div class="row">

                    <div class="col-sm-6 col-md-6 col-lg-6">

                        <div class="well well-light well-sm no-margin no-padding">

                            <div class="row"> <!--  Main div -->

                                <div class="col-sm-12">
                                    <div id="myCarousel" class="carousel fade profile-carousel">
                                        <div class="air air-bottom-right padding-10">
                                        </div>
                                        <div class="air air-top-left padding-10">
                                            <h4 class="txt-color-black font-md">
                                              <span title="{{Sentry::getUser()->created_at}}">
                                                Member since 
                                                {{ Sentry::getUser()->created_at->diffForHumans() }}
                                              </span>
                                            </h4>
                                        </div>
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <!-- Slide 1 -->
                                            <div class="item active">
                                                <img src="img/demo/s1.jpg" alt="demo user">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="item">
                                                <img src="img/demo/s2.jpg" alt="demo user">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="item">
                                                <img src="img/demo/m3.jpg" alt="demo user">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-3 profile-pic">
                                            @if(Sentry::getUser()->photo)
                                            	<img id="photo" src="{{URL::to('/photos/' . Sentry::getUser()->photo)}}" alt="demo user" data-toggle="modal" data-target="#myModal">
                                            @else
                                            	<img id="photo" src=" {{URL::to('/img/avatar.png') }} " alt="demo user" data-toggle="modal" data-target="#myModal">
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <h1>{{ Sentry::getUser()->first_name }}<span class="semi-bold">  {{ Sentry::getUser()->last_name }}  </span>
                                            <br>
                                            <small> @foreach(Sentry::getUser()->groups as $group) {{ $group->name }} @endforeach </small></h1>

                                            <ul class="list-unstyled">
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-phone"></i>&nbsp;&nbsp; <span class="txt-color-darken"></span> <span class="txt-color-darken">{{ Sentry::getUser()->phone }}</span>  <span class="txt-color-darken"></span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:{{ Sentry::getUser()->email }}">  {{ Sentry::getUser()->email }}   </a>
                                                    </p>
                                                </li>


                                            </ul>
                                            <br>

                                            @if(Sentry::getUser()->description)
	                                            <p class="font-md">
	                                                <i>{{ trans('profile.little') }}</i>
	                                            </p>
	                                            <p>
	                                              {{ Sentry::getUser()->description }}
	                                            </p>
	                                        @endif

                                            <br>

                                             <button class="btn btn-warning" id="clickme">
                                                  {{ trans('profile.edit_now') }}
                                             </button>
                                             <br> <br>

                                             

                                        </div>



                                    </div>


                                </div>



                            </div>



                        </div>

                    </div>




                                 <!-- Left side  -->

                                 <div style="display: none;" class="col-sm-6 col-md-6 col-lg-6" id="toggleprofile">

                                       			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
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
                                       					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                       					<h2> {{ trans('profile.edit') }} </h2>

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

                                       						<form id="profile-form" class="smart-form" novalidate="novalidate" action="{{URL::to('editProfile')}}" method="post" enctype="multipart/form-data" >
                                       							<header>
                                       								{{ trans('profile.details') }}
                                       							</header>
                                                                  <!-- For Larevel PUT METHOD ! -->
                                                                  <input type="hidden" name="_method" value="put" />
                                       							<fieldset>

                                       								<div class="row">
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-user"></i>
                                       											<input type="text" name="first_name" placeholder="{{ trans('profile.first_name') }}" value="{{ Sentry::getUser()->first_name }}" required>
                                       										</label>
                                       									</section>
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-user"></i>
                                       											<input type="text" name="last_name" placeholder="{{ trans('profile.last_name') }}" value="{{ Sentry::getUser()->last_name }}">
                                       										</label>
                                       									</section>
                                       								</div>

                                       								<div class="row">
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                       											<input type="email" name="email" placeholder="{{ trans('profile.email') }}" value="{{ Sentry::getUser()->email }}">
                                       										</label>
                                       									</section>
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-phone"></i>
                                       											<input type="tel" name="phone" placeholder="{{ trans('profile.phone') }}" data-mask="(999) 999-9999" value="{{ Sentry::getUser()->phone }}">
                                       										</label>
                                       									</section>
                                       								</div>

                                       								<div class="row">
                                                           <section class="col col-6">
                                                               <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                                                   <input id="password" type="password" name="password" placeholder="{{ trans('profile.password') }}">
                                                               </label>
                                                           </section>
                                                           <section class="col col-6">
                                                               <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                                                   <input type="password" name="password_confirm" placeholder="{{ trans('profile.password_confirm') }}">
                                                               </label>
                                                           </section>
                                                      </div>

                                       							</fieldset>

                                                    <fieldset>
                                                      <section>
                                                          
                                                          <label class="textarea">                    
                                                            <textarea name="description" rows="4" class="custom-scroll">{{ Sentry::getUser()->description }}</textarea> 
                                                          </label>
                                                          <div class="note">
                                                            <strong>{{ trans('profile.description') }}</strong>
                                                          </div>
                
                                                        </section>

                                                    </fieldset>

                                       							<footer>
                                       								<button type="submit" class="btn btn-primary">
                                       									{{ trans('profile.update') }}
                                       								</button>
                                       							</footer>
                                       						</form>

                                       					</div>
                                       					<!-- end widget content -->


                                       				</div>
                                       				<!-- end widget div -->

                                       			</div>
                                       			<!-- end widget -->

                                 </div>


                   </div>


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
        <h4 class="modal-title" id="myModalLabel">Upload a New Photo</h4>
      </div>
      <div class="modal-body">
        <form action="/file-upload" class="dropzone" id="mydropzone"></form>
        <small><b>Max upload size is 5MB</b></small>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id="upload" type="button" class="btn btn-primary" data-dismiss="modal">Upload</button>
      </div>
    </div>
  </div>
</div>






@stop



@section('custom-js')

	<script src="js/plugin/dropzone/dropzone.min.js"></script>

  	<script type="text/javascript">

  		$(document).ready(function(){

  			Dropzone.autoDiscover = false;
			$("#mydropzone").dropzone({
				url: "/changePhoto",
				addRemoveLinks : true,
				maxFilesize: 5,
				dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
				dictResponseError: 'Error uploading file!'
			});

			$('#upload').on('click', function(e){
				$.ajax({
					type: "GET",
					url: '/myProfile',
					success: function(response){
						$('img#photo').attr('src', '/photos/' + response.photo);
					}
				});
			});

  			$( "#clickme" ).click(function() {
		      $( "#toggleprofile" ).toggle("slow");
		    });

		    var $profileForm = $('#profile-form').validate({
		      // Rules for form validation
		        rules : {
		          first_name : {
		            required : true
		          },
		          last_name : {
		            required : true
		          },
		          email : {
		            required : true,
		            email: true
		          },
		          phone : {
		            required : true
		          },
		          password : {
		            minlength : 6,
		            maxlength : 20
		          },
		          password_confirm : {
		            minlength : 6,
		            maxlength : 20,
		            equalTo : '#password'
		          },
		        },
		    
		        // Messages for form validation
		        messages : {
		          first_name : {
		            required : 'Please enter your first name'
		          },
		          last_name : {
		            required : 'Please enter your last name'
		          },
		          email : {
		            required : 'Please enter your email',
		            email: 'Please enter a valid email'
		          },
		          phone : {
		            required : 'Please enter your phone number'
		          },
		          password : {
		            required : 'Please enter your password'
		          },
		          password_confirm : {
		            required : 'Please enter your password one more time',
		            equalTo : 'Password confirmation does not match!'
		          },
		        },
		    
		        // Do not change code below
		        errorPlacement : function(error, element) {
		          error.insertAfter(element.parent());
		        }
		      });

  		});

  </script>


@stop