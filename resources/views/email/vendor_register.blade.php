@component('mail::message')
Thanks {{$vendor->contact_name}},

Your application for brand '{{$vendor->brand_name}}' has been received.

Your application id is : {{$vendor->id}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
