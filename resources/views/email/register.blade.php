@component('mail::message')
Thank you {{$user->name}} for registering.

Your account has been created.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
