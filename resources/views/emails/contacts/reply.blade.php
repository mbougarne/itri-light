@component('mail::message')
# Hello {{ $reply['first_name'] }},

{{ $reply['body'] }}

<br>
Best regards,<br>
{{ config('app.name') }}
@endcomponent
