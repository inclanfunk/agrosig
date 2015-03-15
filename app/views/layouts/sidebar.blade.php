<aside id="left-panel">

		<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">

			     @if(Sentry::getUser()->photo)
                    <img src=" {{URL::to('/photos/'.Sentry::getUser()->photo)}} " alt="me" class="online">
                    @else
                     <img src=" {{URL::to('/img/avatar.png') }} "alt="me" class="online">
                 @endif

				<span>
				  {{ Sentry::getUser()->first_name }}
				</span>
				<i class="fa fa-angle-down"></i>
			</a>

		</span>
	</div>
	<!-- end user info -->

	<!-- NAVIGATION : This navigation is also responsive

	To make this navigation dynamic please make sure to link the node
	(the reference to the nav > ul) after page load. Or the navigation
	will not initialize.
	-->
	<nav>
		<!-- NOTE: Notice the gaps after each icon usage <i></i>..
		Please note that these links work a bit different than
		traditional href="" links. See documentation for details.
		-->

		<ul>
			<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
				<a href="{{ URL::to('dashboard') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-dashboard"></i> <span class="menu-item-parent">Dashboard</span></a>
			</li>


            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">Manage Companies</span></a>
                <ul>
                    <li class="{{ Request::is('companies') ? 'active' : '' }}">
                        <a href="{{ URL::to('companies') }}">List Companies</a>
                    </li>
                    <li class="{{ Request::is('companies/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('companies/create') }}">Create Company</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-tree"></i> <span class="menu-item-parent">Manage Farms</span></a>
                <ul>
                    <li class="{{ Request::is('farms') ? 'active' : '' }}">
                        <a href="{{ URL::to('farms') }}">List Farms</a>
                    </li>
                    <li class="{{ Request::is('farms/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('farms/create') }}">Create Farm</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Manage Users</span></a>
                <ul>
                    <li class="{{ Request::is('users') ? 'active' : '' }}">
                        <a href="{{ URL::to('users') }}">List Users</a>
                    </li>
                    <li class="{{ Request::is('users/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('users/create') }}">Create User</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">Manage Equipment</span></a>
                <ul>
                    <li class="{{ Request::is('equipment') ? 'active' : '' }}">
                        <a href="{{ URL::to('equipment') }}">List Equipment</a>
                    </li>
                    <li>
                        <a href="#">Create Eqiupment</a>
                        <ul>
                            <li class="{{ Request::is('pivots/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('pivots/create') }}">Create Pivot</a>
                            </li>   
                            <li class="{{ Request::is('waterpumps/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('waterpumps/create') }}">Create Water Pump</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-reorder"></i> <span class="menu-item-parent">Manage W. Orders</span></a>
                <ul>
                    <li class="{{ Request::is('orders') ? 'active' : '' }}">
                        <a href="{{ URL::to('orders') }}">List</a>
                    </li>
                    <li class="{{ Request::is('orders/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('orders/create') }}">Create</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-comments"></i> <span class="menu-item-parent">Manage Chatrooms</span></a>
                <ul>
                    <li class="{{ Request::is('chatrooms') ? 'active' : '' }}">
                        <a href="{{ URL::to('chatrooms') }}">List</a>
                    </li>
                    <li class="{{ Request::is('chatrooms/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('chatrooms/create') }}">Create</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">Manage Order Parts</span></a>
                <ul>
                    <li class="{{ Request::is('parts') ? 'active' : '' }}">
                        <a href="{{ URL::to('parts') }}">List</a>
                    </li>
                    <li class="{{ Request::is('parts/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('parts/create') }}">Create</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Manage Forum</span></a>
                <ul>
                    <li class="{{ Request::is('chatrooms') ? 'active' : '' }}">
                        <a href="#">Manage Sections</a>
                        <ul>
                            <li class="{{ Request::is('sections') ? 'active' : '' }}">
                                <a href="{{ URL::to('sections') }}">
                                    <i class="fa fa-table"></i>
                                    List
                                </a>
                            </li>   
                            <li class="{{ Request::is('sections/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('sections/create') }}">
                                    <i class="fa fa-pencil"></i>
                                    Create
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Manage Topics</a>
                        <ul>
                            <li class="{{ Request::is('topics') ? 'active' : '' }}">
                                <a href="{{ URL::to('topics') }}">
                                    <i class="fa fa-table"></i>
                                    List
                                </a>
                            </li>   
                            <li class="{{ Request::is('topics/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('topics/create') }}">
                                    <i class="fa fa-pencil"></i>
                                    Create
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-globe"></i> <span class="menu-item-parent">Maps</span></a>
                <ul>
                    <li>
                        <a href="#">Crops</a>
                    </li>
                    <li class="{{ Request::is('equipment-map') ? 'active' : '' }}">
                        <a href="{{ URL::to('equipment-map') }}">Equipment</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li class="{{ Request::is('calendar') ? 'active' : '' }}">
                <a href="{{ URL::to('calendar') }}"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Calendar</span></a>
            </li>
            @endif

            <li class="{{ Request::is('forum') ? 'active' : '' }}">
                <a href="{{ URL::to('forum') }}"><i class="fa fa-lg fa-fw fa-question-circle"></i> <span class="menu-item-parent">Forum</span></a>
            </li>

            <li class="chat-users top-menu-invisible">
                        <a href="#"><i class="fa fa-lg fa-fw fa-comment-o"></i> <span class="menu-item-parent">Chat</span></a>
                        <ul>
                            <li>
                                <!-- DISPLAY USERS -->
                                <div class="display-users">

                                    <input id="chat-filter" class="form-control chat-user-filter" placeholder="Filter" type="text">

                                    {{--*/ $users = User::all() /*--}}
                                    @foreach($users as $user)
                                        <a href="#" class="usr"
                                            data-chat-id="{{ $user->id }}" 
                                            data-chat-fname="{{ $user->first_name }}" 
                                            data-chat-lname="{{ $user->last_name }}" 
                                            data-chat-role="{{ $user->groups()->first()->name }}"
                                            data-chat-status="online" 
                                            data-chat-alertmsg="" 
                                            data-chat-alertshow="false" 
                                            data-rel="popover-hover" 
                                            data-placement="right" 
                                            data-html="true" 
                                            data-content="
                                                <div class='usr-card'>
                                                    <img src='{{ $user->photo != '' ? '/photos/' . $user->photo : '/img/avatar.png' }}' alt='{{ $user->first_name }} {{ $user->last_name }}' width='50px'>
                                                    <div class='usr-card-content'>
                                                        <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                                        <p>{{ $user->groups()->first()->name }}</p>
                                                    </div>
                                                </div>
                                            "> 
                                            <i></i>{{ $user->first_name }} {{ $user->last_name }}
                                        </a>
                                    @endforeach

                                </div>
                                <!-- END DISPLAY USERS -->
                            </li>
                        </ul>   
                    </li>

		</ul>

	</nav>

	<span class="minifyme" data-action="minifyMenu">
		<i class="fa fa-arrow-circle-left hit"></i>
	</span>

</aside>

