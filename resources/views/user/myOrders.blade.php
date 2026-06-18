@extends('user.layouts.app')

@section('user_Orders')

<div class="container py-5">

    <h2 class="mb-4">My Orders</h2>

    <div class="card">
        <div class="card-body">

            <table class="table">

                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr>

                            <td>#{{$loop->iteration}}</td>

                            <td>
                                Rs {{ number_format($order->total_amount, 2) }}
                            </td>

                            <td>
                                {{ ucfirst($order->status) }}
                            </td>

                            <td>
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <a href="{{route('user.orderDetails',$order->id)}}">View Details
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                No Orders Found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection