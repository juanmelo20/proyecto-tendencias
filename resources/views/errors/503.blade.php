@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="background-color: #FFFF00; height:575px">  <section class="content">
        <div class="error-page mt-5">
          <h2 class="headline text-warning"> 503</h2>

          <div class="error-content">
            <h3><i class="fas fa-tools text-warning"></i> Servicio no disponible temporalmente.</h3>

            <p>
               Lo sentimos, el servicio no está disponible en este momento debido a tareas de mantenimiento. <br>
               Por favor, inténtalo de nuevo más tarde.
            </p>
          
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
  </section>
</div>
@endsection