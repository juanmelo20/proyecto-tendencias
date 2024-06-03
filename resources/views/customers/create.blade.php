@extends('layouts.app')

@section('title', 'Create Customers')

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
							style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;background:white;">
							@yield('title')
						</div>
						<div class="w-50 mx-auto">
							<div class="d-flex justify-content-center">
								<img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
									alt="" style="width:50%;">
							</div>
						</div>

						<form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data"
							class="bg-white">
							@csrf

							<div class="card-body">
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 ">
										<div class="form-group label-floating">
											<label class="control-label">Name <strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="name"
												placeholder="Name Customer" autocomplete="off"
												value="{{ old('name') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">IdentificationDocument <strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="identification_document"
												placeholder="Identity document number" autocomplete="off"
												value="{{ old('identification_document') }}">
										</div>

										<div class="form-group label-floating">
											<label class="control-label">Address<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="address"
												placeholder="Address" autocomplete="off"
												value="{{ old('address') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Phone<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="phone"
												placeholder="telephone number" autocomplete="off"
												value="{{ old('phone') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Email<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="email"
												placeholder="e-mail address" autocomplete="off"
												value="{{ old('email') }}">
										</div>
										<div class="form-group label-floating">
											<input type="hidden" class="form-control" name="registeredby"
												value=" {{ Auth::user()->id}}">
										</div>
										<div class="form-group label-floating">
											<input type="hidden" class="form-control" name="estado" value="1">
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
								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registradopor"
									value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row d-flex justify-content-center">
									<div class="col-lg-2 col-xs-4">
										<button type="submit"
											class="btn  btn-block btn-flat rounded bg-danger text-black"
											style="font-weight: 700;">Register </button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}"
											class="btn btn-danger btn-block btn-flat rounded"
											style=" background-color:#ff98a2;border:none;font-weight: 700;color: black;">Back</a>
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