@extends('theme.default')

@section('content')

<?php
                    $termsandcondition = \App\Models\TermsandCondition::first();


                    ?>


<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Terms and Conditions</h1>
             
				<p>  {!!$termsandcondition->terms_contents!!}</p>
             

			</div>
		</div>
	</div>
</section>




@endsection
