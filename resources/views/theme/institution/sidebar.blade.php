<div class="app-sidebar sidebar-shadow">
				<div class="app-header__logo">
					<div class="logo-src"></div>
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
								data-class="closed-sidebar">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>

				<div class="scrollbar-sidebar">
					<div class="app-sidebar__inner">
						<ul class="vertical-nav-menu">
							<li class="{{ Request::routeIs('institutionprofile') ? 'mm-active' : '' }}">
							<a href="{{ route('institutionprofile', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/home-icon.svg">
									<span>Home Page Edit</span>
									<img class="metismenu-state-icon" src="images/home-icon.svg">
								</a>
							</li>

                            <li class="{{ Request::routeIs('institutioncategory') ? 'mm-active' : '' }}">
								<a href="{{ route('institutioncategory', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/page-icon.svg">
									<span>Category</span>
									<img class="metismenu-state-icon" src="images/page-icon.svg">
								</a>
							</li>

							<li class="{{ Request::routeIs('institutionpage') ? 'mm-active' : '' }}">
								<a href="{{ route('institutionpage', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/page-icon.svg">
									<span>Pages CRUD</span>
									<img class="metismenu-state-icon" src="images/page-icon.svg">
								</a>
							</li>




							<li class="active_nav">
								<a href="#" class="main-menu-link">
									<img class="metismenu-icon" src="images/setting-icon.svg">
									<span>Teachers Page</span>
									<img class="metismenu-state-icon" src="images/setting-icon.svg">
								</a>
								<div class="hide-menu">

									<a href="{{ route('institutionmyteacher', ['institution_id' => $_GET['institution_id']]) }}" class="{{ Request::routeIs('institutionmyteacher') ? 'submenu-active-link' : '' }}">
										<img class="metismenu-icon" src="images/icon-arrow-right2.svg">
										My Teachers
										<img class="metismenu-state-icon" src="images/setting-icon.svg">
									</a>


								</div>
							</li>

							<li class="{{ Request::routeIs('assigncourserequest') ? 'mm-active' : '' }}">
                            <a href="{{ route('assigncourserequest', ['institution_id' => $_GET['institution_id']]) }}">

									<img class="metismenu-icon" src="images/assign.svg">
									<span>Assigned Courses Requests</span>
									<img class="metismenu-state-icon" src="images/assign.svg">
								</a>
							</li>


							<li class="{{ Request::routeIs('institutioncourse') ? 'mm-active' : '' }}">
								<a href="{{ route('institutioncourse', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/course-icon.svg">
									<span>Courses Crud</span>
									<img class="metismenu-state-icon" src="images/course-icon.svg">
								</a>
                           </li>
                           <li class="{{ Request::routeIs('assigncoursetoteacher') ? 'mm-active' : '' }}">
                                <a  href="{{ route('assigncoursetoteacher',['institution_id' => $_GET['institution_id']]) }}">
                                <img class="metismenu-icon" src="images/assign.svg">
									<span>View Assigned Courses</span>
									<img class="metismenu-state-icon" src="images/assign.svg">
                                  </a>
							</li>

							<li class="{{ Request::routeIs('showinstitutionsubscription') ? 'mm-active' : '' }}">
							<a href="{{ route('showinstitutionsubscription', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/subscription-icon.svg">
									<span>Subscription</span>
									<img class="metismenu-state-icon" src="images/subscription-icon.svg">
								</a>
							</li>

							<li class="{{ Request::routeIs('institutionfaq') ? 'mm-active' : '' }}">
								<a href="{{ route('institutionfaq', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/faq.svg">
									<span>Faq Crud</span>
									<img class="metismenu-state-icon" src="images/faq.svg">
								</a>
							</li>


							<li class="{{ Request::routeIs('institutionmenu') ? 'mm-active' : '' }}">
								<a href="{{ route('institutionmenu', ['institution_id' => $_GET['institution_id']]) }}">
									<img class="metismenu-icon" src="images/menu-icon.svg">
									<span>Menu Crud</span>
									<img class="metismenu-state-icon" src="images/menu-icon.svg">
								</a>
							</li>

<!-- / -->

                            <li class="active_nav">
								<a href="#" class="main-menu-link">
									<img class="metismenu-icon" src="images/setting-icon.svg">
									<span>Settings</span>
									<img class="metismenu-state-icon" src="images/setting-icon.svg">
								</a>
								<div class="hide-menu">
									<a href="{{ route('institutioncompany', ['institution_id' => $_GET['institution_id']]) }}" class="{{ Request::routeIs('institutioncompany') ? 'submenu-active-link' : '' }}">
										<img class="metismenu-icon" src="images/icon-arrow-right2.svg">
										Company Settings
										<img class="metismenu-state-icon" src="images/setting-icon.svg">
									</a>

									<a href="{{ route('institutionsystem', ['institution_id' => $_GET['institution_id']]) }}" class="{{ Request::routeIs('institutionsystem') ? 'submenu-active-link' : '' }}">
										<img class="metismenu-icon" src="images/icon-arrow-right2.svg">
										System Settings
										<img class="metismenu-state-icon" src="images/setting-icon.svg">
									</a>

									<a href="{{ route('institutionbannersetting', ['institution_id' => $_GET['institution_id']]) }}" class="{{ Request::routeIs('institutionbannersetting') ? 'submenu-active-link' : '' }}">
										<img class="metismenu-icon" src="images/icon-arrow-right2.svg">
										Banner Settings
										<img class="metismenu-state-icon" src="images/setting-icon.svg">
									</a>
								</div>
							</li>





<!--  -->
							<li>
								<a href="#">
									<img class="metismenu-icon" src="images/form.svg">
									<span>Form Crud</span>
									<img class="metismenu-state-icon" src="images/form.svg">
								</a>
							</li>

							<li>
								<a href="#">
									<img class="metismenu-icon" src="images/certificate.svg">
									<span>Certificate Crud</span>
									<img class="metismenu-state-icon" src="images/certificate.svg">
								</a>
							</li>


							<li>
								<a href="#">
									<img class="metismenu-icon" src="images/message.svg" alt="Messages">
									<span>View Messages</span>
									<img class="metismenu-state-icon" src="images/message.svg" alt="Messages">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
