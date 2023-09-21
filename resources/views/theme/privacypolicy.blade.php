@extends('theme.default')

@section('content')


<?php
                    $privacypolicy = \App\Models\Privacypolicy::first();


                    ?>

<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Privacy Policy</h1>

				<p>  {!!@$privacypolicy->privacy_policy!!}</p>

			</div>
		</div>
	</div>
</section>


@endsection
