<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <div class=" mt-4">
      <div class="d-flex justify-content-center">
        <img class="w-25 rounded-circle mx-auto my-0" src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2" alt="">
      </div>
      <h5 class="text-center mt-1 text-white">Construye facil</h5>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar bg-danger">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="home" class="nav-link active text-black">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          
          <li class="nav-item ">
            <a href="#" class="nav-link " style="background:#ff98a2;">
             <i class="fa-solid fa-money-check-dollar text-black"></i>
              <p class="text-black" style="font-size:17px;">
                Sales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('customers.index')}}" class="nav-link text-white">
                <i class="fa-solid fa-users"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link text-white">
                <i class="fas fa-tools text-white"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link text-white">
                <i class="fa-solid fa-file-pen "></i>
                  <p>Orders</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>