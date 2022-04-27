@component('mail::message')
    # Order Details

    Your refund request has been received. Your amount will be refunded in few hours.

    **Order ID:** {{ $order->id }}

    **Order Email:** {{ $order->billing_email }}


    You can get further details about your order by logging into our website.

    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
        Go to Website
    @endcomponent

    Thank you again for choosing us.

    Regards,
    {{ config('app.name') }}
@endcomponent
