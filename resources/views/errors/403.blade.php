@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="background-color: #8B0000; height:575px">        <div class="error-page mt-5">
          <h2 class="headline text-warning"> 403</h2>

          <div class="error-content">
            <h3><i class="fas fa-ban text-warning"></i> Oops! Acceso prohibido.</h3>

            <p>
               Lo sentimos, no tienes permiso para acceder a esta página. <br>
               Por favor, verifica tus credenciales o contacta al administrador del sistema.
            </p>
            <div class="d-flex justify-content-center mr-5">
              <a href="{{route('home')}}" class="btn btn-success">Regresar</a>
            </div> 
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
  </section>
</div>
@endsection