@include('admin.layouts.partials.header')
@include('admin.layouts.partials.sidebar')
@yield('dashboard_section') 
@yield('category_section') 
@yield('category_section_details') 
@yield('products_section')
@yield('product_section_details')

@yield('allorders_section') 
@yield('admin_orderdetails_section')   

@yield('login_form') 

@include('admin.layouts.partials.footer')
   <!-- Hero -->