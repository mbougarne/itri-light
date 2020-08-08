@component('mail::message')
# Hello {{ admin_profile()->first_name }}

You have new message from **{{ $contact->first_name }}**, the message details:

- Sender Full Name: **{{ $contact->first_name . ' ' . $contact->last_name}}**
- Email Address: **{{ $contact->email }}**
- Subject: **{{ $contact->subject }}**

{{ $contact->body }}

@component('mail::button', ['url' => route('contacts.single', $contact->id)])
Reply
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
