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
      <!-- FOOTER -->
     @include('user.layouts.partials.footer')   
