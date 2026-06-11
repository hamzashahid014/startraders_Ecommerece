@php  
@endphp
@extends('user.layouts.app')
@section('home_hero')
    <div class="container">
           <section id="hero">
         <div class="hs hs1"></div>
         <div class="hs hs2"></div>
         <div class="hbgtxt">FOOD</div>
         <div class="container">
            <div class="row align-items-center g-5" style="min-height:88vh;">
               <div class="col-lg-6">
                  <div class="hbadge">
                     <div class="hbi"><i class="fas fa-star"></i></div>
                     <span>#1 Rated Fast Food Restaurant in New York</span>
                  </div>
                  <h1 class="htitle">Delicious <span class="hl">Fast Food</span><br/>for Every Moment</h1>
                  <p class="hdesc">Experience bold flavors crafted from premium ingredients. From crispy burgers to gourmet pizzas - every bite is an adventure worth savoring.</p>
                  <div class="d-flex flex-wrap gap-3 mb-2">
                     <a href="#menu" class="btn-red"><i class="fas fa-utensils"></i>Explore Menu</a>
                     <!-- FIX 2: Magnific popup video trigger -->
					 <a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup btn-play popup-youtube">
						<div class="pico"><i class="fas fa-play"></i></div>
						<span>Watch Our Story</span>
					 </a>
                  </div>
                  <div class="hstats d-flex gap-3 flex-wrap mt-4">
                     <div class="hstat"><span class="snum">850<em>+</em></span><small>Happy Customers</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">120<em>+</em></span><small>Menu Items</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">15<em>+</em></span><small>Expert Chefs</small></div>
                     <div class="sdiv"></div>
                     <div class="hstat"><span class="snum">12<em>yr</em></span><small>Experience</small></div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div style="position:relative;text-align:center;">
                     <div class="hcircle">
                        <img src="{{ asset('user/img/banner-img.jpg') }}" alt="Burger"/>
                     </div>
                     <div class="fcard fc1">
                        <div class="fcoi r"><i class="fas fa-fire"></i></div>
                        <div><span class="fcnum">Hot Deal</span><span class="fcsm">30% off today</span></div>
                     </div>
                     <div class="fcard fc2">
                        <div class="fcoi y"><i class="fas fa-star"></i></div>
                        <div><span class="fcnum">4.9/5</span><span class="fcsm">2k+ reviews</span></div>
                     </div>
                     <div class="fcard fc3">
                        <div class="fcoi g"><i class="fas fa-clock"></i></div>
                        <div><span class="fcnum">20 min</span><span class="fcsm">Fast delivery</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection

@section('home_marquee')
 <div class="mqsec">
         <div class="mqtrack">
            <div class="mqitem"><i class="fas fa-circle"></i>Crispy Fried Chicken</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Gourmet Burgers</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Artisan Pizzas</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Fresh Wraps &amp; Rolls</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Loaded Fries</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Ice Cream Shakes</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Grilled Sandwiches</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Crispy Fried Chicken</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Gourmet Burgers</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Artisan Pizzas</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Fresh Wraps &amp; Rolls</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Loaded Fries</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Ice Cream Shakes</div>
            <div class="mqitem"><i class="fas fa-circle"></i>Grilled Sandwiches</div>
         </div>
      </div>
@endsection

@section('home_category')
 <section id="category">
         <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
               <span class="slbl">What We Offer</span>
               <h2 class="stitle">Browse by <span>Category</span></h2>
               <div class="sline"></div>
               <p class="sdesc mx-auto" style="max-width:480px;">From sizzling burgers to exotic world cuisines - find your favourite in our menu</p>
            </div>

            <div class="row g-3 justify-content-center">
                    <!-- <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="70">
                  <div class="catcard" data-filter="burgers">
                     <img class="catimg" src="{{ asset('user/img/category/2.jpg') }}" alt=""/>
                     <div class="catnm">All items</div>
                     <div class="catct">24 items</div>
                  </div>
               </div> -->
               @foreach($categories as $category)

            <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="0">
                  <div class="catcard active" data-filter="all">
                    <a href="{{route('user.categoryProducts',$category)}}"> <img class="catimg" src="{{ asset('/storage/'.$category->image) }}" alt=""/></a>
                     <div class="catnm">{{ $category->name }}</div>
                     <div class="catct">{{ $category->products->count() }} items</div>
                  </div>
               </div>
               @endforeach
               <div class="text-center mt-5"><a href="{{route('user.categories')}}" class="btn-red"><i class="fas fa-th-large"></i>View Full Menu</a></div>
            </div>
         </div>
      </section>

@endsection

@section('home_products')
<section id="menu">
         <div class="container">
            <div class="text-center mb-5 aos-init aos-animate" data-aos="fade-up">
               <span class="slbl">What's Cooking</span>
               <h2 class="stitle">Our Delicious <span>Items</span></h2>
               <div class="sline"></div>
            </div>
            
            <div class="row g-4" id="mgrid">
               <!-- CARD 1: Burgers -->
                      @foreach($products as $product)
               <div class="col-sm-6 col-lg-4 mwrap aos-init aos-animate" data-c="burgers" data-aos="fade-up" style="opacity: 1; transform: translateY(0px); transition: opacity 0.38s, transform 0.38s;">
                  <div class="mcard" data-img="img/menu/1.jpg" data-title="Classic Smash Burger" data-cat="Burgers" data-price="$14.99" data-old="$18.99" data-rating="4.9" data-reviews="128" data-cal="620" data-time="12" data-desc="Double smashed patty, cheddar cheese, caramelized onions, house pickles and our legendary special sauce. Made fresh to order on a toasted brioche bun." data-tags="Spicy,Bestseller,Beef">
                     <div class="mimg">
                        <img src="{{asset('storage/'.$product->image)}}" alt="Smash Burger">
                        <div class="mbdg hot"><i class="fas fa-star"></i> Hot</div>
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                     </div>
                     <div class="mbody">
                        <div class="mcat">{{$product->category->name}}</div>
                        <div class="mtit">{{$product->name}}</div>
                        <div class="mdesc">{{$product->description}}</div>
                        <div class="mfoot">
                           <div>
                              <div class="mprice">Rs{{$product->sale_price}} <small>$18.99</small></div>
                              <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">(128)</span></div>
                           </div>
                           <button class="madd" title="View Details" data-bs-toggle="modal" data-bs-target="#modal-default{{ $product->id }}"><i class="fas fa-plus" ></i></button>
                        
                        
</div>
                     </div>
                  </div>
               </div>
@endforeach
            </div>
            <!-- end #mgrid -->
            
         </div>
      </section>


      @foreach($products as $product)

<div class="modal fade" id="modal-default{{ $product->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content food-modal">

            <button type="button" class="btn-close food-close" data-bs-dismiss="modal"></button>

            <div class="row g-0">

                <!-- Left Side Image -->
                <div class="col-lg-5">
                    <div class="food-image-wrapper">
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="{{ $product->name }}"
                             class="food-image">
                    </div>
                </div>

                <!-- Right Side Content -->
                <div class="col-lg-7">

                    <div class="food-details">

                        <span class="food-badge">
                            {{ $product->category?->name }}
                        </span>

                        <h2 class="food-title">
                            {{ $product->name }}
                        </h2>

                        <div class="food-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                            <span>4.8 (128 Reviews)</span>
                        </div>

                        <p class="food-description">
                            {{ $product->description }}
                        </p>

                      <div class="food-meta">

    <div class="meta-item">
        <div class="meta-value">520</div>
        <div class="meta-label">Calories</div>
    </div>

    <div class="meta-item">
        <div class="meta-value">15</div>
        <div class="meta-label">Minutes</div>
    </div>

    <div class="meta-item">
        <div class="meta-value">4.8</div>
        <div class="meta-label">Rating</div>
    </div>

</div>

                        <div class="food-price">
                            Rs {{ number_format($product->sale_price) }}
                        </div>

                       <div class="purchase-section">

    <div class="qty-section">
        <button class="qty-btn">-</button>
        <span class="qty-number">1</span>
        <button class="qty-btn">+</button>
    </div>

    <button class="cart-btn">
        <i class="fas fa-shopping-cart me-2"></i>
        Add To Cart
    </button>

</div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

@endforeach
   @endsection
