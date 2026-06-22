@extends('user.layouts.app')

@section('paymentMethod_section')

<div class="container mt-5">

    <h2>Stripe Payment</h2>

    <hr>

    <h4>Order #{{ $order->id }}</h4>

    <p>
        Total Amount:
        Rs {{ number_format($order->total_amount,2) }}
    </p>

    <p>
        Payment Status:
        {{ ucfirst($order->payment_status) }}
    </p>

    <button class="btn btn-primary">
        Pay With Stripe
    </button>

</div>

@endsection