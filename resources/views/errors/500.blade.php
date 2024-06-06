@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="background-color: #FF0000; height:575px">  <section class="content">
        <div class="error-page mt-5">
          <h2 class="headline text-warning"> 500</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Error interno del servidor.</h3>

            <p>
               Lo sentimos, ha ocurrido un error inesperado en el servidor. <br>
               Nuestro equipo técnico ha sido notificado y estamos trabajando para solucionarlo.
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