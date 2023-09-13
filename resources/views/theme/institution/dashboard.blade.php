
@extends('theme.institution.default')

@section('content')

		<div class="app-main">
        @include('theme.institution.sidebar')
			<div class="app-main__outer">
				<div class="app-main__inner">
					<div class="row">
						<div class="col-lg-9">
							<div class="teacher-grid">
								<h2>Statistics</h2>
								<div class="row">
									<div class="col-lg-3 col-md-6">
										<div class="statistics-row">
											<div class="stat-image">
                                                <img src="images/payment-icon.svg" alt="">
                                            </div>
                                            <div class="stat-info">
                                                <h5>Payment</h5>
                                                <h2>$1500</h2>
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
                                                <h2>400</h2>
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
                                                <h2>100</h2>
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
						</div>
						<div class="col-lg-3">
							Hello
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
