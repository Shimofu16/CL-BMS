@component('mail::message')

Hello, {{ $data['name'] }}!

Please click the button below to verify your email address:

@component('mail::button', ['url' => $data['url']])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent
