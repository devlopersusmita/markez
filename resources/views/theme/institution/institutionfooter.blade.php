<!-- Footer Start -->
<?php
                    $institution_company_settings = \App\Models\InstitutionCompanySetting::first();


                    ?>
<footer class="footer-two">
	<div class="footer-top-two">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Teach With Us</a></li>

						<li><a href="#"> About us</a></li>
						<li><a href="#contact">Contact us</a></li>

					</ul>
				</div>
				<div class="col-md-3">
					<div class="divider"></div>
					<ul>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Help and Support</a></li>

					</ul>
				</div>
				<div class="col-md-3">
					<div class="divider"></div>
					<ul>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy policy</a></li>

					</ul>
				</div>
				<div class="col-md-3">
					<div class="custom-gap"></div>
					<h4>Sign Up Now</h4>
					<h5>GET 10% OFF YOUR NEXT ORDER</h5>
					<p>Sign up and get product launches, tips, and sales to your inbox weekly.</p>
					<div class="email-box">
						<input type="email" class="form-control" placeholder="Email ID">
						<button type="submit"><img src="../public/images/submit-arrow.svg"></button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="footer-bottom-two">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>{!!$institution_company_settings->footer_text!!}</p>
				</div>
			</div>
		</div>
	</div>

</footer>

<!-- Footer End -->
