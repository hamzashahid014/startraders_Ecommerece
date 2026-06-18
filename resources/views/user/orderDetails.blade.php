@extends('user.layouts.app')

@section('orderDetails_section')

<div class="container py-5">

    <h2>Order #{{ $order->id }}</h2>

    <div class="card mb-4">
        <div class="card-body">

            <p>
                <strong>Status:</strong>
                {{ ucfirst($order->status) }}
            </p>

            <p>
                <strong>Payment:</strong>
                {{ strtoupper($order->payment_method) }}
            </p>

            <p>
                <strong>Total:</strong>
                Rs {{ number_format($order->total_amount,2) }}
            </p>

        </div>
    </div>

    <div class="card">

        <div class="card-header">
            Ordered Items
        </div>

        <div class="card-body">

            <table class="table">

                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($order->orderItems as $item)

                    <tr>

                        <td>
                            {{ $item->product->name }}
                        </td>

                        <td>
                            Rs {{ number_format($item->price,2) }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>
                            Rs {{ number_format($item->subtotal,2) }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection