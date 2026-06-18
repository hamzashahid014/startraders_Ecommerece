@extends('user.layouts.app')
@section('dashboard_content')
@php
$userOrders=Auth::user()->orders()->latest()->get();

@endphp
<div class="container py-5">

    <div class="row">

        <!-- Sidebar -->
        <div class="col-lg-3 mb-4">

            <div class="dash-sidebar">

                <h4 class="mb-4">
                    My Account
                </h4>

                <a href="#" class="dash-link active">
                    Dashboard
                </a>

                <a href="{{route('user.orders')}}" class="dash-link">
                    My Orders
                </a>

                <a href="#" class="dash-link">
                    Favorites
                </a>

                <a href="#" class="dash-link">
                    Profile
                </a>

                <a href="#" class="dash-link">
                    Change Password
                </a>

                <a href="{{route('user.logout')}}" class="dash-link">
                    Logout
                </a>

            </div>

        </div>

        <!-- Main Content -->
        <div class="col-lg-9">

            <!-- Hero Section -->

            <div class="dashboard-hero">

                <h2 style="color:white">
                    Welcome Back,
                    {{ Auth::user()->name }}
                </h2>

                <p >
                    Ready for another delicious experience?
                </p>

            </div>

            <!-- Stats -->

            <div class="row mt-4">

                <div class="col-md-3 mb-3">
                    <div class="dash-card">
                        <h3>{{ Auth::user()->orders()->count() }}</h3>
                        <span>Total Orders</span>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="dash-card">
                        <h3>0</h3>
                        <span>Favorites</span>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="dash-card">
                        <h3>0</h3>
                        <span>Reviews</span>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="dash-card">
                        <h3>0</h3>
                        <span>Reward Points</span>
                    </div>
                </div>

            </div>

            <!-- Recent Orders -->

            <div class="dashboard-section mt-4">

                <h4 class="mb-4">
                    Recent Orders
                </h4>
                @forelse($userOrders as $order)
                <div class="order-item">
                    <div>
                        <h6>#{{$order->id}}</h6>
                        <small>Delivered</small>
                    </div>

                    <strong>Rs. 2500</strong>
                </div>
                @empty
                 <strong>Order Not Found</strong>
                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection