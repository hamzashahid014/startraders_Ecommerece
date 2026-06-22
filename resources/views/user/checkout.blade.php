@extends('user.layouts.app')

@section('checkout_content')

<div class="container py-5">

    <h2 class="mb-4">Checkout</h2>

    <div class="row">
            @if($errors->Err->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->Err->all() as $error)

                <li>{{ $error }}</li>

            @endforeach


        </ul>

    </div>

@endif

   @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif

        <!-- Customer Details -->
        <div class="col-lg-7">

            <div class="card">
                <div class="card-header">
                    Customer Information
                </div>

                <div class="card-body">

                    <form action="{{route('place.order')}}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Order Type
                            </label>

                            <select name="order_type"
                                    class="form-control">

                                <option value="delivery">
                                    Delivery
                                </option>

                                <option value="pickup">
                                    Pickup
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Delivery Address
                            </label>

                            <textarea
                                name="address"
                                rows="3"
                                class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Notes
                            </label>

                            <textarea
                                name="notes"
                                rows="3"
                                class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Payment Method
                            </label>

                            <select
                                name="payment_method"
                                class="form-control">

                                <option value="cod">
                                    Cash On Delivery
                                </option>

                                <option value="stripe">
                                    Online Payment
                                </option>

                            </select>
                        </div>
                <button type="submit" class="btn btn-success w-100 mt-4"> Place Order </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">

            <div class="card">

                <div class="card-header">
                    Order Summary
                </div>

                <div class="card-body">

                    @php
                        $cartTotal = 0;
                    @endphp

                    @foreach($cart as $item)

                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $cartTotal += $itemTotal;
                        @endphp

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                {{ $item['name'] }}
                                x
                                {{ $item['quantity'] }}
                            </span>

                            <span>
                                Rs {{ number_format($itemTotal) }}
                            </span>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between">

                        <strong>Total</strong>

                        <strong>
                            Rs {{ number_format($cartTotal) }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection