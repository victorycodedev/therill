@component('mail::message')
# Hey There!!

{!! $demo->message !!}

<br>
Kind regards,<br>
{{ config('app.name') }}
@endcomponent
