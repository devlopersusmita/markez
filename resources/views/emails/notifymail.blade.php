@component('mail::message')

# Dear {{$details['receiver_name']}},
<br>
{!!$details['body']!!}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
