@extends('layouts.app')
@section('title', 'List of orders')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">

				@include('layouts.partial.msg')

			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card bg-white">
						<div class="card-header border-0 bg-white"
							style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center; color:#000;">
							@yield('title')
							<a href="{{ route('orders.create') }}" class="btn btn-primary ml-4 bg-danger" title="Nuevo"
								style=" border: none;"><i class="fas fa-plus nav-icon text-white"></i></a>
						</div>
						<div class="w-50 mx-auto bg-white">
							<div class="d-flex justify-content-center">
								<img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
									alt="" style="width:30%;">
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead class="text-primary">
									<tr>
										<th>ID</th>
										<th>Customer Name</th>
										<th>Customer Document</th>
										<th>Date of Sale</th>
										<th>Total</th>
										<th>Registered by</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($orders as $order)
										<tr>
											<td>{{ $order->id }}</td>
											<td>{{ $order->name}}</td>
											<td>{{ $order->identification_document}}</td>
											<td>{{ $order->date_of_sale }}</td>
											<td>{{ $order->total_payment}}</td>
											<td>{{ $order->registeredby}}</td>

											<td>
												<div class="d-flex justify-content-center">
													<input data-id="{{$order->id}}" class="toggle-class m-0" type="checkbox"
														data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
														data-on="✔" data-off="✘" {{ $order->status ? 'checked' : '' }}>
												</div>

											</td>

											<td>
												<a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm"
													title="Mostrar"><i class="fa-solid fa-eye"></i></a>
												<button onclick="window.open('{{ $order->route }}', '_blank')"
													class="btn btn-primary btn-sm" title="Ver factura">
													<i class="fa-solid fa-file-pdf"></i> 
												</button>
												<form class="d-inline delete-form"
													action="{{ route('orders.destroy', $order) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" class=" btn btn-danger btn-sm" title="Delete">
														<i class="fas fa-trash-alt"></i>
													</button>
												</form>

											</td>

									@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->


					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection
@push('scripts')
	<script src="https://kit.fontawesome.com/a1efcc9a1e.js" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function () {
			$("orders").DataTable()
		});
		$(function () {
			$('.toggle-class').change(function () {
				var status = $(this).prop('checked') == true ? 1 : 0;
				var order_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'changestatusorder',
					data: { 'status': status, 'order_id': order_id },
					success: function (data) {
						console.log(data.success)
					}
				});
			})
		})
	</script>
	<script>
		$('.delete-form').submit(function (e) {
			e.preventDefault();
			Swal.fire({
				title: 'Estas seguro?',
				text: "Este registro se eliminara definitivamente",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Aceptar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					this.submit();
				}
			})
		});
	</script>
	@if(session('eliminar') == 'ok')
		<script>
			Swal.fire(
				'Eliminado',
				'El registro ha sido eliminado exitosamente',
				'success'
			)
		</script>
	@endif
	<script type="text/javascript">
		$(function () {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": true,
				"autoWidth": false,
				//"buttons": ["excel", "pdf", "print", "colvis"],
				"language":
				{
					"sLengthMenu": "Mostrar _MENU_ entradas",
					"sEmptyTable": "No hay datos disponibles en la tabla",
					"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
					"sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
					"sSearch": "Buscar:",
					"sZeroRecords": "No se encontraron registros coincidentes en la tabla",
					"sInfoFiltered": "(Filtrado de _MAX_ entradas totales)",
					"oPaginate": {
						"sFirst": "Primero",
						"sPrevious": "Anterior",
						"sNext": "Siguiente",
						"sLast": "Ultimo"
					},
					/*"buttons": {
						"print": "Imprimir",
						"colvis": "Visibilidad Columnas"
						/*"create": "Nuevo",
						"edit": "Cambiar",
						"remove": "Borrar",
						"copy": "Copiar",
						"csv": "fichero CSV",
						"excel": "tabla Excel",
						"pdf": "documento PDF",
						"collection": "Colección",
						"upload": "Seleccione fichero...."
					}*/
				}
			});//.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
	</script>
@endpush