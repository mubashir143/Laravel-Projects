<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
              {{-- <img
                src="{{ asset('/') }}adminlte/dist/assets/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
              /> --}}
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Haachi Technology</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    {{-- <i class="nav-arrow bi bi-chevron-left"></i> --}}
                  </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul> --}}
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.product') }}" class="nav-link">
                  <i class="nav-icon bi bi-bag-fill "></i>
                  <p class="">Add Products</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-person-fill"></i>
                  <p>
                    User
                    <i class="nav-arrow bi bi-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.user') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.role') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Roles</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.permission') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Permissions</p>
                    </a>
                  </li>
                </ul>
              </li> 
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-layers-fill"></i>
                  <p>
                    Category
                    <i class="nav-arrow bi bi-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Category</p>
                    </a>
                  </li>
                 
                  
                </ul>
              </li> 


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-briefcase-fill"></i>
                  <p>
                    Vendor
                    <i class="nav-arrow bi bi-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('vendor.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Vendors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ground.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Grounds</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('facility.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Facilities</p>
                    </a>
                  </li>
                </ul>
              </li> 


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-cart-fill"></i>
                  <p>
                    Market Place
                    <i class="nav-arrow bi bi-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('marketplace.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Market Place</p>
                    </a>
                  </li>
                 
                  
                </ul>
              </li> 

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-exclamation-circle-fill"></i>
                  <p>
                    Updates
                    <i class="nav-arrow bi bi-chevron-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('notification.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>Notifications</p>
                    </a>
                  </li>

                    <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link">
                      <i class="nav-icon bi bi-record-circle"></i>
                      <p>News</p>
                    </a>
                  </li>
                 
                  
                </ul>
              </li> 
</aside>