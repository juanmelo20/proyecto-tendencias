@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="background-color: #FF8C00; height:575px">
  <section class="content">
        <div class="error-page mt-5">
          <h2 class="headline text-warning"> 419</h2>

          <div class="error-content">
            <h3><i class="fas fa-clock text-warning"></i> Oops! Sesión expirada.</h3>

            <p>
               Tu sesión ha expirado debido a inactividad. <br>
               Por razones de seguridad, debes iniciar sesión nuevamente.
            </p>
            <div class="d-flex justify-content-center mr-5">
             
              <div class="nav-item dropdown rounded d-flex align-items-center justify-content-center w-100 mx-2 bg-danger">
                <div id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            {{ __('Start new section ') }}
                 </a>
                 <i class="fa-solid fa-right-from-bracket mx-2"></i>
                </div>
      
             
                
      
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                  </form>
               </div>
             </div>
            </div> 
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
  </section>
</div>
@endsection