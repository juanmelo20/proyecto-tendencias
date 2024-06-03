@extends('layouts.app')

@section('title', 'Create Products')

@section('content')

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
		</div>
	</section>
	@include('layouts.partial.msg')

	<section class="content">
		<div class="container-fluid ">
			<div class="row ">
				<div class="col-md-12 d-flex justify-content-center">
					<div class="card w-75 bg-white">
						<div class="card-header border-0 "
							style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;color:#000;background:white;">
							@yield('title')
						</div>
						<div class="w-50 mx-auto">
							<div class="d-flex justify-content-center">
								<img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
									alt="" style="width:50%;">
							</div>
						</div>

						<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
							class="bg-white">
							@csrf

							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="name"
												placeholder="Product Name" autocomplete="off"
												value="{{ old('name') }}">
										</div>
										<label class="control-label">Description<strong
												class="text-danger">(*)</strong></label>
										<div style="display:flex;justify-content: center;">
											<textarea name="description" rows="4" cols="190"
												value="{{ old('description') }}">
                                           </textarea>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Price_Buy <strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="price_buy"
												placeholder="purchase price" autocomplete="off"
												value="{{ old('price_buy') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Price_Sale <strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="price_sale"
												placeholder="sales price" autocomplete="off"
												value="{{ old('price_sale') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Quantity_in_stock<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="quantity_in_stock"
												placeholder="Product quantity" autocomplete="off"
												value="{{ old('quantity_in_stock') }}">
										</div>
										<div class="form-group label-floating">
											<input type="hidden" class="form-control" name="registeredby"
												value=" {{ Auth::user()->id}}">
										</div>
										<div class="form-group label-floating">
											<input type="hidden" class="form-control" name="status" value="1">
										</div>

										<div class="row">
											<div class="row">
												<div class="row">
													<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
														<div class="form-group label-floating">
															<label class="control-label">Image</label>
															<input type="file" class="form-control-file" name="image"
																id="image">
														</div>
													</div>
												</div>
											</div>

										</div>

									</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor"
									value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row d-flex justify-content-center">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block btn-flat rounded bg-danger "
											style="font-weight: 700;">Register</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}"
											class="btn btn-danger btn-block btn-flat rounded"
											style="border:none;font-weight: 700;color: black;background:#ff98a2;">Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection