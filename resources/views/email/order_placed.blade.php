@component('mail::message')
    # Order Details

    Thank you for your order.

    **Order ID:** {{ $order->id }}

    **Order Email:** {{ $order->billing_email }}

    **Order Total:** ${{ $order->billing_total }}

    **Items Ordered**
    @foreach ($order->products as $product)
        Name: {{ $product->name }}
        Price: ${{ $product->price }}
        Quantity: {{ $product->pivot->quantity }}
    @endforeach

    You can get further details about your order by logging into our website.

    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
        Go to Website
    @endcomponent

    Thank you again for choosing us.

    Regards,
{{ config('app.name') }}
@endcomponent
