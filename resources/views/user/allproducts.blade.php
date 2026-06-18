@extends('user.layouts.app')
@section('products_section')
<section id="menu">
         <div class="container">
            <div class="text-center mb-5 aos-init aos-animate" data-aos="fade-up">
               <span class="slbl">What's Cooking</span>
               <h2 class="stitle">Our Delicious <span>Items</span></h2>
               <div class="sline"></div>
            </div>
            
            <div class="row g-4" id="mgrid">
               <!-- CARD 1: Burgers -->
                      @foreach($category->products as $product)
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


     @foreach($category->products as $product)

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
                            {{ $product->description }}  {{ $product->id }}
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
        <button class="qty-btn minus-btn">-</button>
        <span class="qty-number">1</span>
        <button class="qty-btn plus-btn">+</button>
    </div>

    <form action="{{route('user.addtocart')}}" method="POST" >
     @csrf
    <button class="cart-btn">
        <i class="fas fa-shopping-cart me-2"></i>
        Add To Cart
    </button>

    <input type="hidden" name="product_qty" class='product_qty'value='1'>
    <input type="hidden" name='product_id' id='product_id' value=' {{ $product->id }}'>
       </form>
    

</div>


                    </div>
                 

                </div>

            </div>

        </div>
    </div>
</div>
  

@endforeach

<script>
    document.querySelectorAll('.plus-btn').forEach(button => {
    button.addEventListener('click', function () {

        let qtyNumber = this.parentElement.querySelector('.qty-number');
        let qty = parseInt(qtyNumber.innerText) + 1;

        qtyNumber.innerText = qty;

        this.closest('.purchase-section')
            .querySelector('.product_qty')
            .value = qty;
    });
});

document.querySelectorAll('.minus-btn').forEach(button => {
    button.addEventListener('click', function () {

        let qtyNumber = this.parentElement.querySelector('.qty-number');
        let qty = parseInt(qtyNumber.innerText);

        if (qty > 1) {
            qty--;

            qtyNumber.innerText = qty;

            this.closest('.purchase-section')
                .querySelector('.product_qty')
                .value = qty;
        }
    });
});
</script>
   @endsection
