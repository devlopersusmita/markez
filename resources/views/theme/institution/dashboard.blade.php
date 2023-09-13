
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
