@extends('theme.default')

@section('content')




     <!-- Institution Start -->
<section class="institution">
	<div class="container">
		<div class="institution-top-row">
			<div class="row align-items-center">
				<div class="col-md-12">
					<h3 class="text-center">All Institutions</h3>
				</div>
			</div>
		</div>
		<div class="institution-col">
			<div class="row">
            @if(!empty($allinstitutions))
                        @foreach($allinstitutions as $allinstitution)
				<div class="col-lg-3 col-md-6">
					<div class="institution-gird text-center">
                    @if(($allinstitution->logo) && (file_exists($allinstitution->logo)))
                                <img src="{{asset($allinstitution->logo)}}" alt="">
                                                            @else
                                                            <img src="{{asset('/images/institution1.png')}}" alt="">
                                                            @endif
						<h4>{{$allinstitution->name}}</h4>
						<p>{!!$allinstitution->description!!}</p>
					</div>
				</div>
                @endforeach
                    @endif
			</div>
		</div>
	</div>
</section>
<!-- Institution End -->



@endsection
