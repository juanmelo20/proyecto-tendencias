<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class=" ml-auto pr-4 ">
    
       <div class="nav-item dropdown rounded d-flex align-items-center justify-content-center w-100 mx-2 bg-danger">
          <div id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name ?? '' }} <i class="fa-solid fa-right-from-bracket mx-2"></i>
          </div>

         <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
           </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
            </form>
         </div>
       </div>
    
    </ul>
  </nav>

  
  <!-- /.navbar -->
  <script src="https://kit.fontawesome.com/a1efcc9a1e.js" crossorigin="anonymous"></script>