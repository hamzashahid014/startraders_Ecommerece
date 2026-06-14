@php
    $cart = session()->get('cart', []);
    $cartCount = count($cart);
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Sarab">
      <meta name="description" content="Sarab - Fast Food & Restaurant HTML Template">
      <title>Sarab - Fast Food & Restaurant HTML Template</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet"/>
      <!-- Bootstrap 5.3 -->
      <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet"/>
      <!-- AOS Animate on Scroll -->
      <link href="{{ asset('user/css/aos.css') }}" rel="stylesheet"/>
      <!-- Swiper -->
      <link href="{{ asset('user/css/swiper-bundle.min.css') }}" rel="stylesheet"/>
      <!-- all min css -->
      <link rel="stylesheet" href="{{ asset('user/css/all.min.css') }}"/>
      <!-- magnific CSS -->
      <link rel="stylesheet" href="{{ asset('user/css/magnific-popup.css') }}"/>
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
       <script src="{{ asset('user/js/cart.js') }}"></script>
   </head>
   <body>
      <!-- ============================================================
         TOP BAR
         ============================================================ -->
      <div id="topbar">
         <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
               <div class="top-contact d-flex flex-wrap">
                  <span><i class="fas fa-phone-alt"></i>+1 (800) 123-4567</span>
                  <span><i class="fas fa-envelope"></i>hello@sarabfood.com</span>
                  <span><i class="fas fa-map-marker-alt"></i>42 Flavor Street, NY</span>
               </div>
               <div class="d-flex align-items-center gap-3">
                  <span class="ttag"><i class="fas fa-fire me-1"></i>Free Delivery Today!</span>
                  <div class="tsoc">
                     <a href="#"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     <a href="#"><i class="fab fa-tiktok"></i></a>
                     <a href="#"><i class="fab fa-youtube"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================
         NAVBAR
         ============================================================ -->
      <nav class="navbar navbar-expand-lg" id="nav">
         <div class="container">
            <a class="navbar-brand" href="#">
               <div class="blogo">
                  <div class="bico"><i class="fas fa-utensils"></i></div>
                  <div>
                     <div class="bname">Sar<span>ab</span>
               
                  </div>
                     <div class="bsub">Fast Food & Restaurant</div>
                  </div>
               </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
               <ul class="navbar-nav mx-auto">
                  <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('user.about')}}">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
                  <li class="nav-item"><a class="nav-link" href="#chefs">Chefs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#reservation">Reservation</a></li>
                  <li class="nav-item"><a class="nav-link" href="#testimonials">Reviews</a></li>
                  <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
               </ul>

               <div class="d-flex align-items-center gap-1">
                 <button class="btn btn-light"
            data-bs-toggle="offcanvas"
            data-bs-target="#cartSidebar">
            <div class="position-relative d-inline-block">

    <i class="fas fa-shopping-cart fa-lg"></i>

    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ $cartCount }}
    </span>

</div>

    </button>
                  <!-- FIX 1: Search button -->
                    </div>
                 <div class="d-flex align-items-center gap-1">
                  <!-- FIX 1: Search button -->
                   @if(Auth::check())
                  <a href="{{route('user.logout')}}" class="nav-link nav-cta"><i class="fas fa-shopping-bag me-1"></i>Log Out</a>
                @else
                  <a href="#menu" class="nav-link nav-cta" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-shopping-bag me-1"></i>Log In</a>
                  @endif
               </div>
                     @if(Auth::check())
               <div class="d-flex align-items-center gap-1">
                  <!-- FIX 1: Search button -->
             
                  <a href="#" class="nav-link nav-cta" ><i class="fas fa-shopping-bag me-1"></i>{{Auth::user()->name}}</a>
               </div>
               @endif


            </div>
         </div>
      </nav>
      <!-- ============================================================
         FIX 1 � SEARCH OVERLAY POPUP
         ============================================================ -->
      <div id="searchOv">
         <button class="sovclose" id="searchClose"><i class="fas fa-times"></i></button>
         <div class="sovbox">
            <h4>What are you craving today?</h4>
            <div class="sovinput">
               <input type="text" id="searchInput" placeholder="Search burgers, pizza, chicken..." autocomplete="off"/>
               <button><i class="fas fa-search"></i></button>
            </div>
            <!-- Categories inside search box -->
            <div class="sovcats">
               <div class="sovcat active" data-cat="all">
                  <img src="{{ asset('user/img/menu/1.jpg') }}" alt=""/>All Items
               </div>
               <div class="sovcat" data-cat="burgers">
                  <img src="{{ asset('user/img/menu/1.jpg') }}" alt=""/>Burgers
               </div>
               <div class="sovcat" data-cat="pizza">
                  <img src="{{ asset('user/img/menu/2.jpg') }}" alt=""/>Pizza
               </div>
               <div class="sovcat" data-cat="chicken">
                  <img src="img/menu/3.jpg" alt=""/>Chicken
               </div>
               <div class="sovcat" data-cat="wraps">
                  <img src="{{ asset('user/img/menu/4.jpg') }}" alt=""/>Wraps
               </div>
               <div class="sovcat" data-cat="pasta">
                  <img src="{{ asset('user/img/menu/5.jpg') }}" alt=""/>Pasta
               </div>
               <div class="sovcat" data-cat="desserts">
                  <img src="{{ asset('user/img/menu/6.jpg') }}" alt=""/>Desserts
               </div>
            </div>
            <div class="sovtrend">
               <p><i class="fas fa-fire me-1" style="color:var(--secondary);"></i>Trending Searches</p>
               <span class="ttag">Smash Burger</span>
               <span class="ttag">Nashville Chicken</span>
               <span class="ttag">Truffle Pizza</span>
               <span class="ttag">Lava Cake</span>
               <span class="ttag">Loaded Fries</span>
               <span class="ttag">Mango Shake</span>
            </div>
         </div>
      </div>
      @if(session('addToCart_success'))

<div class="alert alert-success">
    {{ session('addToCart_success') }}
</div>

@endif

<!-- loginModel -->
      <div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Login</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
   


            <div class="modal-body">
                @if($errors->login->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->login->all() as $error)

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

                <div class="row g-4">

                    <!-- Left Side -->
                    <div class="col-lg-4">

                        <div class="ctdark">

                            <h4>Welcome Back</h4>

                            <p class="ctsub">
                                Login to your StarFoods account.
                            </p>

                            <div class="ctitem">
                                <div class="cticon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>

                                <div class="ctinfo">
                                    <strong>Support</strong>
                                    <span>+92 300 1234567</span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-8">

                        <div class="fcard">

                            <form action="{{route('user.checkLogin')}}" method="POST">
                                @csrf

                                <div class="row g-3">

                                    <div class="col-12">
                                        <label class="flbl">
                                            Email
                                        </label>

                                        <input type="email"
                                               name="email"
                                               class="fctrl"
                                               placeholder="Enter Email">
                                    </div>

                                    <div class="col-12">
                                        <label class="flbl">
                                            Password
                                        </label>

                                        <input type="password"
                                               name="password"
                                               class="fctrl"
                                               placeholder="Enter Password">
                                    </div>

                                    <div class="col-12">
                                       
                                        <button type="submit"
                                                class="btn-red">

                                            Login

                                        </button>
                                        <p>Dont have an account? <a href="" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a></p>

                                    </div>

                                </div>
                                <input type="hidden" name="redirect_to"value="{{ route('user.checkout') }}">
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<!-- Sign Up Model -->
      <div class="modal fade" id="signupModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
<!-- showing errors here -->
 @if($errors->register->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->register->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
<!-- end of errors -->
                <div class="row g-4">

                    <!-- Left Side -->
                    <div class="col-lg-4">

                        <div class="ctdark">

                            <h4>Welcome</h4>

                            <p class="ctsub">
                                Create a new StarFoods account.
                            </p>

                            <div class="ctitem">
                                <div class="cticon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>

                                <div class="ctinfo">
                                    <strong>Support</strong>
                                    <span>+92 300 1234567</span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-8">

                        <div class="fcard">

                            <form action="{{ route('user.registerUser') }}" method="POST">

                                @csrf

                                <div class="row g-3">
                                  <div class="col-12">
                                        <label class="flbl">
                                            User Name
                                        </label>

                                        <input type="text"
                                               name="name"
                                               class="fctrl"
                                               placeholder="Enter User Name">
                                    </div>
                                    <div class="col-12">
                                        <label class="flbl">
                                            Email
                                        </label>

                                        <input type="email"
                                               name="email"
                                               class="fctrl"
                                               placeholder="Enter Email">
                                    </div>

                                    <div class="col-12">
                                        <label class="flbl">
                                            Password
                                        </label>

                                        <input type="password"
                                               name="password"
                                               class="fctrl"
                                               placeholder="Enter Password">
                                    </div>
                                     <div class="col-12">
                                        <label class="flbl">
                                            Confirm Password
                                        </label>

                                        <input type="password"
                                               name="password_confirmation"
                                               class="fctrl"
                                               placeholder="Confirm Password">
                                    </div>

                                    <div class="col-12">

                                        <button type="submit"
                                                class="btn-red">

                                            Sign Up

                                        </button>
                                        <p>Already have an account? <a href="" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end"
     tabindex="-1"
     id="cartSidebar">

    <div class="offcanvas-header">

        <h5>Your Cart</h5>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body">

        @if(count($cart))
        @php 
$cartTotal=0;
@endphp

            @foreach($cart as $item)
@php 
$itemtotal=$item['price'] * $item['quantity'];
$cartTotal+=$itemtotal;
@endphp
                <div class="d-flex align-items-center mb-3">

                    <img src="{{ asset('storage/'.$item['image']) }}"
                         width="60">

                    <div class="ms-3">

                        <h6>{{ $item['name'] }}</h6>

                        
                        <a href="{{ route('cart.decrease', $item['id']) }}"
       class="btn btn-warning btn-sm">
       -
    </a>

    <span>{{ $item['quantity'] }}</span>

    <a href="{{ route('cart.increase', $item['id']) }}"
       class="btn btn-success btn-sm">
       +
    </a>

    <a href="{{ route('cart.remove', $item['id']) }}"
       class="btn btn-danger btn-sm">
    <i class="far fa-trash-alt"></i>
    </a>

                        <br>

                        <strong>
                            Rs {{ $item['price'] }} * {{ $item['quantity'] }}= {{$itemtotal}} 
                        </strong>

                    </div>

                </div>

                <hr>
                
            @endforeach
             <strong>
                            Cart Amount:Rs {{$cartTotal}}
                        </strong>
                        <div class="cart-footer">

    @auth
        <a href="{{ route('user.checkout') }}"
           class="btn btn-success w-100">
            Proceed To Checkout
        </a>
    @endauth

    @guest
        <button
            type="button"
            class="btn btn-success w-100"
            data-bs-toggle="modal"
            data-bs-target="#loginModal">
            Proceed To Checkout
        </button>
    @endguest

</div>
          


        @else

            <p>Your cart is empty.</p>

        @endif

       

    </div>

</div>

@if($errors->register->any())



<script>

document.addEventListener('DOMContentLoaded', function () {

    let signupModal = new bootstrap.Modal(
        document.getElementById('signupModal')
    );

    signupModal.show();

});

</script>

@endif

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    let loginModal = new bootstrap.Modal(
        document.getElementById('loginModal')
    );

    loginModal.show();

});

</script>

@endif


@if($errors->login->any())

<script>

document.addEventListener('DOMContentLoaded', function () {

    let loginModal = new bootstrap.Modal(
        document.getElementById('loginModal')
    );

    loginModal.show();

});

</script>

@endif

<script>

setTimeout(function() {

    document.querySelectorAll('.alert').forEach(function(alert){

        alert.style.transition = "opacity .5s";

        alert.style.opacity = "0";

        setTimeout(() => {

            alert.remove();

        }, 500);

    });

}, 3000);

</script>


@if(session('addToCart_success'))
<!-- 
<script>
document.addEventListener('DOMContentLoaded', function () {

    var loginModal = new bootstrap.Modal(
        document.getElementById('loginModal')
    );

    loginModal.show();

});
</script> -->

@endif