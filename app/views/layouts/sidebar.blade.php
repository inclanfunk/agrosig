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
						<a href="{{ URL::to('dashboard') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
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
						<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">User Managment</span></a>
						<ul>
							<li>
								<a href="{{ URL::to('sadmin/user_create') }}">Create User</a>
							</li>
							<li>
								<a href="{{ URL::to('users') }}">User List</a>
							</li>

						</ul>
					</li>
                    @endif


                    @if(Sentry::getUser()->hasAnyAccess(['system']))
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-globe"></i> <span class="menu-item-parent">Farm Managment</span></a>
						<ul>
							<li>
								<a href="{{ URL::to('farms/create') }}">Create Farm</a>
							</li>
							<li>
								<a href="{{ URL::to('farms') }}">Farm List</a>
							</li>

						</ul>
					</li>
                    @endif

                     @if(Sentry::getUser()->hasAnyAccess(['system']))
                        <li>
                            <a href="#"><i class="fa fa-lg fa-fw   fa-cubes"></i> <span class="menu-item-parent">Equipment Control</span></a>
                            <ul>
                                <li>
                                    <a href="{{ URL::to('equipment/create') }}">Create</a>
                                </li>
                            </ul>
                        </li>
                     @endif





                    @if(Sentry::getUser()->hasAnyAccess(['system']))

					<li>
						<a href="#"><i class="fa fa-lg fa-fw  fa-globe"></i> <span class="menu-item-parent">Viewer Managment</span></a>
						<ul>
							<li>
								<a href="{{ URL::to('farms/create') }}">Create Farm</a>
							</li>
							<li>
								<a href="{{ URL::to('farms') }}">Farm List</a>
							</li>

						</ul>
					</li>

                    @endif







                     <!--
                        <li>
                            <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">Tables</span></a>
                            <ul>
                                <li>
                                    <a href="table.html">Normal Tables</a>
                                </li>
                                <li>
                                    <a href="datatables.html">Data Tables <span class="badge inbox-badge bg-color-greenLight">v1.10</span></a>
                                </li>
                                <li>
                                    <a href="jqgrid.html">Jquery Grid</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Forms</span></a>
                            <ul>
                                <li>
                                    <a href="form-elements.html">Smart Form Elements</a>
                                </li>
                                <li>
                                    <a href="form-templates.html">Smart Form Layouts</a>
                                </li>
                                <li>
                                    <a href="validation.html">Smart Form Validation</a>
                                </li>
                                <li>
                                    <a href="bootstrap-forms.html">Bootstrap Form Elements</a>
                                </li>
                                <li>
                                    <a href="plugins.html">Form Plugins</a>
                                </li>
                                <li>
                                    <a href="wizard.html">Wizards</a>
                                </li>
                                <li>
                                    <a href="other-editors.html">Bootstrap Editors</a>
                                </li>
                                <li>
                                    <a href="dropzone.html">Dropzone </a>
                                </li>
                                <li>
                                    <a href="image-editor.html">Image Cropping <span class="badge pull-right inbox-badge bg-color-yellow">new</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">UI Elements</span></a>
                            <ul>
                                <li>
                                    <a href="general-elements.html">General Elements</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="#">Icons</a>
                                    <ul>
                                        <li>
                                            <a href="fa.html"><i class="fa fa-plane"></i> Font Awesome</a>
                                        </li>
                                        <li>
                                            <a href="glyph.html"><i class="glyphicon glyphicon-plane"></i> Glyph Icons</a>
                                        </li>
                                        <li>
                                            <a href="flags.html"><i class="fa fa-flag"></i> Flags</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                                <li>
                                    <a href="treeview.html">Tree View</a>
                                </li>
                                <li>
                                    <a href="nestable-list.html">Nestable Lists</a>
                                </li>
                                <li>
                                    <a href="jqui.html">JQuery UI</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="#">Six Level Menu</a>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #2</a>
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> Sub #2.1 </a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> Item #2.1.1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-plus"></i> Expand</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fa fa-fw fa-trash-o"></i> Delete</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-folder-open"></i> Item #3</a>

                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-fw fa-folder-open"></i> 3ed Level </a>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-fw fa-file-text"></i> File</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>

                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    -->

                        <li>
                            <a href="{{ URL::to('calendar') }}"><i class="fa fa-lg fa-fw fa-calendar"><em>3</em></i> <span class="menu-item-parent">Calendar</span></a>
                        </li>

                       <li>
                            <a href="{{ URL::to('stock') }}"><i class="fa fa-lg fa-fw fa-shopping-cart"> </i> <span class="menu-item-parent">Stock Market</span></a>
                        </li>


                        <li>
                            <a href="{{ URL::to('forum') }}"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Forum</span></a>
                        </li>



			<!--		<li>
						<a href="widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>
					</li>
                -->
				<!--	<li>
						<a href="gallery.html"><i class="fa fa-lg fa-fw fa-picture-o"></i> <span class="menu-item-parent">Gallery</span></a>
					</li>
					-->

				<!--
					<li>
						<a href="gmap-xml.html"><i class="fa fa-lg fa-fw fa-map-marker"></i> <span class="menu-item-parent">GMap Skins</span><span class="badge bg-color-greenLight pull-right inbox-badge">9</span></a>
					</li>

				<!--	<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-windows"></i> <span class="menu-item-parent">Miscellaneous</span></a>
						<ul>
							<li>
								<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> Other Pages</a>
								<ul>
									<li>
										<a href="forum.html">Forum Layout</a>
									</li>
									<li>
										<a href="profile.html">Profile</a>
									</li>
									<li>
										<a href="timeline.html">Timeline</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="pricing-table.html">Pricing Tables</a>
							</li>
							<li>
								<a href="invoice.html">Invoice</a>
							</li>
							<li>
								<a href="login.html" target="_top">Login</a>
							</li>
							<li>
								<a href="register.html" target="_top">Register</a>
							</li>
							<li>
								<a href="lock.html" target="_top">Locked Screen</a>
							</li>
							<li>
								<a href="error404.html">Error 404</a>
							</li>
							<li>
								<a href="error500.html">Error 500</a>
							</li>
							<li>
								<a href="blank_.html">Blank Page</a>
							</li>
							<li>
								<a href="email-template.html">Email Template</a>
							</li>
							<li>
								<a href="search.html">Search Page</a>
							</li>
							<li>
								<a href="ckeditor.html">CK Editor</a>
							</li>
						</ul>
					</li>

				<!--	<li class="top-menu-hidden">
						<a href="#"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">SmartAdmin Intel</span></a>
						<ul>
							<li>
								<a href="difver.html"><i class="fa fa-stack-overflow"></i> Different Versions</a>
							</li>
							<li>
								<a href="applayout.html"><i class="fa fa-cube"></i> App Settings</a>
							</li>
							<li>
								<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/documentation/index.html" target="_blank"><i class="fa fa-book"></i> Documentation</a>
							</li>
							<li>
								<a href="http://bootstraphunter.com/smartadmin/BUGTRACK/track_/" target="_blank"><i class="fa fa-bug"></i> Bug Tracker</a>
							</li>
						</ul>
					</li>
				-->
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu">
				<i class="fa fa-arrow-circle-left hit"></i>
			</span>

		</aside>

