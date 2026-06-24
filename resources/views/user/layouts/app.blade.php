@include('user.layouts.partials.header')
   <!-- Hero -->
@yield('home_hero')
      <!-- MARQUEE -->
       @yield('home_marquee')
          @yield('dashboard_content')
      <!-- CATEGORY for homePage -->
         @yield('home_category')
          <!-- CATEGORIES for Users -->
          @yield('categories_section')

          @yield('products_section')
              @yield('home_products')
        <!-- ABOUT US -->
         @yield('content_aboutus')
        <!-- Contact -->
         @yield('contactUs')
         
         @yield('checkout_content')
         
         @yield('user_Orders')
         
         @yield('orderDetails_section')

           @yield('orderSuccess_section')

            @yield('paymentMethod_section')
      <!-- FOOTER -->
     @include('user.layouts.partials.footer')   
