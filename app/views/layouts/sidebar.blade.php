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
				<a href="{{ URL::to('dashboard') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-dashboard"></i> <span class="menu-item-parent">{{ trans('sidebar.dashboard') }}</span></a>
			</li>


            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-briefcase"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.companies') }}</span></a>
                <ul>
                    <li class="{{ Request::is('companies') ? 'active' : '' }}">
                        <a href="{{ URL::to('companies') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('companies/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('companies/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-tree"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.farms') }}</span></a>
                <ul>
                    <li class="{{ Request::is('farms') ? 'active' : '' }}">
                        <a href="{{ URL::to('farms') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('farms/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('farms/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.users') }}</span></a>
                <ul>
                    <li class="{{ Request::is('users') ? 'active' : '' }}">
                        <a href="{{ URL::to('users') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('users/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('users/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-wrench"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.equipment') }}</span></a>
                <ul>
                    <li class="{{ Request::is('equipment') ? 'active' : '' }}">
                        <a href="{{ URL::to('equipment') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li>
                        <a href="#">{{ trans('sidebar.create') }}</a>
                        <ul>
                            <li class="{{ Request::is('pivots/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('pivots/create') }}">{{ trans('sidebar.pivot') }}</a>
                            </li>   
                            <li class="{{ Request::is('waterpumps/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('waterpumps/create') }}">{{ trans('sidebar.waterpump') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-reorder"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.orders') }}</span></a>
                <ul>
                    <li class="{{ Request::is('orders') ? 'active' : '' }}">
                        <a href="{{ URL::to('orders') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('orders/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('orders/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-comments"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.chatrooms') }}</span></a>
                <ul>
                    <li class="{{ Request::is('chatrooms') ? 'active' : '' }}">
                        <a href="{{ URL::to('chatrooms') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('chatrooms/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('chatrooms/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-shopping-cart"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.parts') }}</span></a>
                <ul>
                    <li class="{{ Request::is('parts') ? 'active' : '' }}">
                        <a href="{{ URL::to('parts') }}">{{ trans('sidebar.list') }}</a>
                    </li>
                    <li class="{{ Request::is('parts/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('parts/create') }}">{{ trans('sidebar.create') }}</a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Sentry::getUser()->hasAnyAccess(['system']))
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">{{ trans('sidebar.manage') }} {{ trans('sidebar.forum') }}</span></a>
                <ul>
                    <li class="{{ Request::is('chatrooms') ? 'active' : '' }}">
                        <a href="#">{{ trans('sidebar.manage') }} {{ trans('sidebar.sections') }}</a>
                        <ul>
                            <li class="{{ Request::is('sections') ? 'active' : '' }}">
                                <a href="{{ URL::to('sections') }}">
                                    <i class="fa fa-table"></i>
                                    {{ trans('sidebar.list') }}
                                </a>
                            </li>   
                            <li class="{{ Request::is('sections/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('sections/create') }}">
                                    <i class="fa fa-pencil"></i>
                                    {{ trans('sidebar.create') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">{{ trans('sidebar.manage') }} {{ trans('sidebar.topics') }}</a>
                        <ul>
                            <li class="{{ Request::is('topics') ? 'active' : '' }}">
                                <a href="{{ URL::to('topics') }}">
                                    <i class="fa fa-table"></i>
                                    {{ trans('sidebar.list') }}
                                </a>
                            </li>   
                            <li class="{{ Request::is('topics/create') ? 'active' : '' }}">
                                <a href="{{ URL::to('topics/create') }}">
                                    <i class="fa fa-pencil"></i>
                                    {{ trans('sidebar.create') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-globe"></i> <span class="menu-item-parent">{{ trans('sidebar.maps') }}</span></a>
                <ul>
                    <li>
                        <a href="#">{{ trans('sidebar.crops') }}</a>
                    </li>
                    <li class="{{ Request::is('equipment-map') ? 'active' : '' }}">
                        <a href="{{ URL::to('equipment-map') }}">{{ trans('sidebar.equipment') }}</a>
                    </li>
                </ul>
            </li>

            @if(Sentry::getUser()->groups()->first()->name == 'Manager' || Sentry::getUser()->groups()->first()->name == 'Super Administrator')
            <li class="{{ Request::is('calendar') ? 'active' : '' }}">
                <a href="{{ URL::to('calendar') }}"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">{{ trans('sidebar.calendar') }}</span></a>
            </li>
            @endif

            @if(Sentry::getUser()->groups()->first()->name == 'Manager')
            <li class="{{ Request::is('chat') ? 'active' : '' }}">
                <a href="{{ URL::to('chat') }}"><i class="fa fa-lg fa-fw fa-comment-o"></i> <span class="menu-item-parent">{{ trans('sidebar.chat') }}</span></a>
            </li>
            @endif

            <li class="{{ Request::is('forum') ? 'active' : '' }}">
                <a href="{{ URL::to('forum') }}"><i class="fa fa-lg fa-fw fa-question-circle"></i> <span class="menu-item-parent">{{ trans('sidebar.forum') }}</span></a>
            </li>

            <li class="{{ Request::is('orders') ? 'active' : '' }}">
                <a href="{{ URL::to('orders') }}"><i class="fa fa-lg fa-fw fa-reorder"></i> <span class="menu-item-parent">{{ trans('sidebar.orders') }}</span></a>
            </li>

		</ul>

	</nav>

	<span class="minifyme" data-action="minifyMenu">
		<i class="fa fa-arrow-circle-left hit"></i>
	</span>

</aside>

