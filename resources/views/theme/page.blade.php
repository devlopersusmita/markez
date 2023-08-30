@extends('theme.default')

@section('content')




        <div class="store-sections" style="margin-top:100px;">
            <div class="container is-desktop">

            <div class="column header-text">
                <h1>{!!$page->title!!}</h1>
            </div>             

            {!!$page->contents!!}
              
            </div>
        </div>



@endsection