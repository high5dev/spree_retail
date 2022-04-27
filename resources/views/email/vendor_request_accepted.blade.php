@component('mail::message')
Congratulations, Your request to become a vendor is accepted successfully.

Here are your login credentials:

Email: {{$user->email}}

Password: {{$r_pass}}


Click on the below button to get started

@component('mail::button', ['url' => route('vendor')])
Vendor Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
