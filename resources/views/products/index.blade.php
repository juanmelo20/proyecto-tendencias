@extends('layouts.app')

@section('title','List Products')

@section('content')

<div class="content-wrapper mt-4">
@include('layouts.partial.msg')
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card bg-white">
						<div class="card-header border-0 bg-white" style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center; color:#000;">
							@yield('title')
							<a  href="{{ route('products.create') }}" class="btn btn-primary ml-4 bg-danger" title="Nuevo" style=" border: none;"><i class="fas fa-plus nav-icon text-white"></i></a>
						</div>
						<div class="w-50 mx-auto bg-white">
                            <div class="d-flex justify-content-center">
								<img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
                                    alt="" style="width:30%;">
                            </div>
                        </div>
						<div class="card-body ">
							<table  id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary ">
									<tr>
										<th width="10px">ID</th>
										<th>Name</th>
                                        <th width="80px">Description</th>
                                        <th>Price_buy</th>
                                        <th>Price_sale</th>
                                        <th>Quantity_in_stock</th>
                                        <th>Image</th>
										<th>Registeredby</th>
										<th width="60px">Status</th>
										<th width="50px">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td >{{$product->id}}</td>
										<td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price_buy}}</td>
                                        <td>{{$product->price_sale}}</td>
                                        <td>{{$product->quantity_in_stock}}</td>
                                        <td>@if ($product->image != null)
                                                        <center>
                                                            <p><img class="img-responsive img-thumbnail"
                                                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                                                    style="height: 70px; width: 70px;" alt=""></p>
                                                        </center>
                                                    @elseif ($product->image == null)
                                                    @endif</td>
										<td>{{$product->registeredby}}</td>
										<td>
											<div class="d-flex justify-content-center">
											<input data-id="{{$product->id}}" class="toggle-class m-0" type="checkbox" data-onstyle="success" data-offstyle="danger" 
											data-toggle="toggle" data-on="✔" data-off="✘" {{ $product->status ? 'checked' : '' }}>
											</div>
											
										</td>
			
										<td>
										
											<a href="{{ route('products.edit',$product->id) }}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>

											<form class="d-inline delete-form" action="{{ route('products.destroy', $product) }}"  method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
											</form>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
 </div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
			$("products").DataTable()
		});
		$(function() {
			$('.toggle-class').change(function() {
				var status = $(this).prop('checked') == true ? 1 : 0;
				var product_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'changestatusproduct',
					data: {'status': status, 'product_id': product_id},
					success: function(data){
					  console.log(data.success)
					}
				});
			})
		  })
	</script>
	<script>
	$('.delete-form').submit(function(e){
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