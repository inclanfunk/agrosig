@extends('layouts.master')


@section('content')


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
                                                {{ Sentry::getUser()->created_at->diffForHumans(Carbon::now()) }}
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
                                            <img src="{{URL::to('/photos/' . Sentry::getUser()->photo)}}" alt="demo user">
                                            @else
                                             <img src=" {{URL::to('/img/avatar.png') }} " alt="demo user">
                                            @endif
                                            <div class="padding-10">
                                                <h4 class="font-md"><strong>   </strong>
                                                <br>
                                                <small> </small></h4>
                                                <br>
                                                <h4 class="font-md"><strong>   </strong>
                                                <br>
                                                <small>  </small></h4>
                                            </div>
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
                                            <p class="font-md">
                                                <i>A little about me...</i>
                                            </p>
                                            <p>
                                              {{ Sentry::getUser()->description }}

                                            </p>

                                            <br>

                                             <button class="btn btn-warning" id="clickme">
                                                  Edit Your Profile Now
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
                                       					<h2> Edit your profile </h2>

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

                                       						<form id="order-form" class="smart-form" novalidate="novalidate" action="{{URL::to('editProfile')}}" method="post" enctype="multipart/form-data" >
                                       							<header>
                                       								Profile Details
                                       							</header>
                                                                  <!-- For Larevel PUT METHOD ! -->
                                                                  <input type="hidden" name="_method" value="put" />
                                       							<fieldset>

                                       								<div class="row">
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-user"></i>
                                       											<input type="text" name="first_name" placeholder="First Name" value="{{ Sentry::getUser()->first_name }}">
                                       										</label>
                                       									</section>
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-user"></i>
                                       											<input type="text" name="last_name" placeholder="Last Name" value="{{ Sentry::getUser()->last_name }}">
                                       										</label>
                                       									</section>
                                       								</div>

                                       								<div class="row">
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                       											<input type="email" name="email" placeholder="E-mail" value="{{ Sentry::getUser()->email }}">
                                       										</label>
                                       									</section>
                                       									<section class="col col-6">
                                       										<label class="input"> <i class="icon-append fa fa-phone"></i>
                                       											<input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999" value="{{ Sentry::getUser()->phone }}">
                                       										</label>
                                       									</section>
                                       								</div>

                                       								<div class="row">
                                                           <section class="col col-6">
                                                               <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                                                   <input type="password" name="password" placeholder="Password">
                                                               </label>
                                                           </section>
                                                           <section class="col col-6">
                                                               <label class="input"> <i class="icon-append fa  fa-lock"></i>
                                                                   <input type="password" name="password_confirm" placeholder="Confirm Password">
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
                                                            <strong>Provide a small description about yourself!</strong>
                                                          </div>
                
                                                        </section>

                                                    </fieldset>


                                       							<fieldset>

                                       							<div class="col-md-10">
                                                        <input type="file" class="btn btn-default" id="profile_pic" name="photo">
                                                        <p class="help-block">
                                                           Upload your profile photo
                                                        </p>
                                                    </div>


                                       							</fieldset>

                                       							<footer>
                                       								<button type="submit" class="btn btn-primary">
                                       									Update Profile
                                       								</button>
                                     								     <span style="color: red;"> {{ $errors->first('email'); }} </span><br>
                                                         <span style="color: red;"> {{ $errors->first('first_name'); }} </span>
                                                         <span style="color: red;"> {{ $errors->first('last_name'); }} </span>
                                                         <span style="color: red;"> {{ $errors->first('phone'); }} </span>
                                                         <span style="color: red;"> {{ $errors->first('password'); }} </span>
                                                         <span style="color: red;"> {{ $errors->first('password_confirm'); }} </span>
                                       							</footer>
                                       						</form>

                                       					</div>
                                       					<!-- end widget content -->


                                                               @if(Session::has('error_msg'))
                                                                               <p class="alert alert-danger">{{Session::get('error_msg')}}</p>
                                                               @endif

                                                               @if (Session::has('message'))
                                                                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                                                               @endif


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






@stop



@section('custom-js')
<script type="text/javascript">



$( "#clickme" ).click(function() {
  $( "#toggleprofile" ).toggle( "slow", function() {
    // Animation complete.
  });
});



</script>


@stop