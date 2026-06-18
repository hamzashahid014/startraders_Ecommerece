  <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ asset('admin/dist/assets/img/AdminLTELogo.png') }}"
              alt="Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <a href="{{route('admin.dashboard')}}"><span class="brand-text fw-light">{{Auth::user()->name}}</span></a>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              data-accordion="false"
              id="navigation"
            >
             
            
               
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Categories
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{route('admin.categories')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Categories</p>
                    </a>
                  </li>

                  
                  <li class="nav-item">
                    <a href="./widgets/info-box.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add New Category</p>
                    </a>
                  </li>


                
                </ul>
              

                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Products
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{route('admin.products')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Products</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="./widgets/info-box.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Add New Product</p>
                    </a>
                  </li>
                  
             

         </ul>


                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Orders
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{route('admin.allOrders')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Orders</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="{{route('admin.pendingOrders')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Pending Orders</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.approvedOrders')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Approved Orders</p>
                    </a>
                  </li>
                  
             

         </ul>

                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Customers
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="{{route('admin.products')}}" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>All Customers</p>
                    </a>
                  </li>
                  
             

         </ul>

              <li class="nav-item">
                <a href="{{route('admin.logout')}}" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Logout
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
</li>

            <!--end::Sidebar Menu-->

          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->