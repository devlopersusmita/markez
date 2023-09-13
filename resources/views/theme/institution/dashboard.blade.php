
@extends('theme.institution.default')

@section('content')

		<div class="app-main">
        @include('theme.institution.sidebar')
			<div class="app-main__outer">
				<div class="app-main__inner">
					<div class="row">
						<div class="col-lg-9">
							<div class="statistics-grid">
								<h2>Statistics</h2>
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<div class="statistics-row">
											<div class="stat-image">
                                                <img src="images/payment-icon.svg" alt="">
                                            </div>
                                            <div class="stat-info">
                                                <h5>Payment</h5>
                                                <h2>${{$total_payment}} </h2>
                                            </div>
										</div>
									</div>

                                    <div class="col-lg-3 col-md-6">
										<div class="statistics-row">
											<div class="stat-image">
                                                <img src="images/student-icon.svg" alt="">
                                            </div>
                                            <div class="stat-info">
                                                <h5>Students</h5>
                                                <h2>{{$total_student}}</h2>
                                            </div>
										</div>
									</div>

                                    <div class="col-lg-3 col-md-6">
										<div class="statistics-row">
											<div class="stat-image">
                                                <img src="images/course.svg" alt="">
                                            </div>
                                            <div class="stat-info">
                                                <h5>Cources</h5>
                                                <h2>{{$course_count}}</h2>
                                            </div>
										</div>
									</div>

                                    <div class="col-lg-3 col-md-6">
										<div class="statistics-row">
											<div class="stat-image">
                                                <img src="images/visitor-icon.svg" alt="">
                                            </div>
                                            <div class="stat-info">
                                                <h5>Visitor</h5>
                                                <h2>800</h2>
                                            </div>
										</div>
									</div>

								</div>
							</div>
                            <div class="teacher-grid">
                                <div class="teacher-grid-top-info">
                                    <h2>Teachers</h2>
                                    <a href="#">View All</a>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="teacher-profile text-center">
                                            <img src="images/profile-edit-bg.png" alt="" class="teacher-profile-img">
                                            <h4>Arijit Tarafdar</h4>
                                            <p>Subject: <span>Math</span></p>
                                            <div class="three-dots">
                                                <img src="images/ellipsis.png" alt="">
                                                <div class="hover-box">
                                                    <a href="#" class="active">View Profile</a>
                                                    <a href="#">Send Request</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

						    </div>
						<div class="col-lg-3">
							<div class="sidebar-section">
                                <h2>Students</h2>
                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                                <div class="sidebar-profile">
                                    <div class="sidebar-profile-img">
                                        <img src="images/sidebar-profile.png" alt="">
                                    </div>
                                    <div class="sidebar-profile-info">
                                        <h2>Debdas Mondal</h2>
                                        <h5>Debdas Mondal</h5>
                                    </div>
                                </div>

                            </div>
						</div>
					</div>

				</div>

				<div class="app-wrapper-footer">
					<div class="app-footer">
						<div class="app-footer__inner">
							<div class="app-footer-left">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
        @endsection
