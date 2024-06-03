@extends('layouts.app')

@section('title', 'Bill')

@section('content')

    <div class="content-wrapper">
        <section class="content bg-white pb-4">
            <h1 class="mt-2 text-center text-danger" style="font-weight:700;">Show Information</h1>
            <div class="container-fluid bg-white">
            <div class="w-50 mx-auto bg-white">
            <div class="d-flex justify-content-center">
                <img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2"
                style="width:30%;">
            </div>
          </div>
                <div class="row p-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body w-100">
                                <h5 class="card-title " style="font-weight:700;">Orders Details</h5>
                                <p class="card-text"><strong>Date of Sale:</strong>{{$order->date_of_sale}} </p>
                                <p class="card-text"><strong>Total Payment:</strong>{{$order->total_payment}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Customer Details</strong></h5>
                                <p class="card-text"><strong>Customer Name:</strong> {{ $customer->name}}</p>
                                <p class="card-text"><strong>Identification Document:</strong> {{ $customer->identification_document}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  ">
                    <div class="card-header " style="background-color:#ff98a2;">
                        <h3 class="card-title w-100 text-center " style="font-weight:700;">Items Order</h3>
                    </div>
                    <div class="card-body p-0 ">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($details as $detail)
                                    <tr>
                                        <td>{{$detail->name}}</td>
                                        <td>{{$detail->price_sale}}</td>
                                        <td>{{$detail->quantity}}</td>
                                        <td>{{$detail->subtotal}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection