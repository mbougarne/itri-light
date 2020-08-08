@component('mail::message')
{{ $reply['body'] }}

<br>
Best regards,<br>
{{ config('app.name') }}
@endcomponent
