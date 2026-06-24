@extends('user.layouts.app')

@section('orderSuccess_section')

<div class="container py-5 text-center">

    <h1 class="text-success">
        Thank You For Your Order!
    </h1>

    <p class="mt-3">
        Your order has been placed successfully.
    </p>

    <a href="{{ route('user.orders') }}" class="btn btn-primary mt-3">
        View My Orders
    </a>

</div>

@endsection