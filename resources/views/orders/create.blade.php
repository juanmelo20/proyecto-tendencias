@extends('layouts.app')

@section('title', 'Create Order')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="card w-75  bg-white">
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
                        <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="form-fields">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating ">
                                            <label class="control-label">Customer<strong
                                                    style="color:red;">(*)</strong></label>
                                            <select type="text" class="form-control select2" name="customer"
                                                value="{{ old('customer') }}">
                                                <option value="">Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" class="form-control" name="status" value="1">
                                        <input type="hidden" class="form-control" name="registeredby"
												value=" {{ Auth::user()->id}}">
                                    </div>
                                </div>

                                <div class="row mt-2" data-details-field=true>
                                    <div class="col-3 w-100">
                                        <label class="control-label">Product<strong
                                                style="color:red;">(*)</strong></label>
                                        <select id="product" class="form-control">
                                            <option value="-">Select a product</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price_sale }}"
                                                    data-name="{{ $product->name }}">
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-around mt-4">
                                        <div class="col-2">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity">
                                        </div>
                                        <div class="col-2">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" readonly value="">
                                        </div>
                                        <div class="col-2">
                                            <label for="subtotal">Subtotal</label>
                                            <input type="number" name="subtotal" value="{{ old('subtotal')}}" readonly>
                                        </div>
                                        <div class=" d-flex align-items-center">
                                            <button class="btn btn-danger" style="font-weight:700" id="add-btn">
                                                Add
                                            </button>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-11 m-5">
                                        <table class="table border">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="background-color:#CBCBCB;">Product</th>
                                                    <th scope="col" style="background-color:#CBCBCB;">Quantity</th>
                                                    <th scope="col" style="background-color:#CBCBCB;">Price</th>
                                                    <th scope="col" style="background-color:#CBCBCB;">Subtotal</th>
                                                    <th scope="col" style="background-color:#CBCBCB;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody id="list-products">
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-0 d-flex justify-content-center">
                                <div class="col-4">
                                    <span class="h3 d-block text-center m-1" id="total-text">
                                        Total Payment: $0
                                    </span>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <input name="total_payment" value="{{old('total_payment')}}" hidden>
                                    <div class="col-4">
                                        <button type="submit"
                                            class="btn btn-danger btn-block btn-flat" style="font-weight:700;">Register</button>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('orders.index') }}"
                                            class="btn btn-danger btn-block btn-flat" style=" background-color:#ff98a2;border:none;font-weight: 700;color: black;">Back</a>
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

<style>
    .select2 [role="textbox"] {
        margin-top: -8px !important;
        margin-left: -8px !important;
    }
</style>
@endsection

@push('scripts')
    <script>
        class Order {
            constructor(id, name, quantity, price) {
                this.id = id;
                this.name = name;
                this.price = price;
                this.quantity = quantity;
            }

            get subtotal() {
                return this.price * this.quantity;
            }

            generateHTML() {
                return `
                                            <tr data-id="${this.id}">
                                                <td>${this.name}</td>
                                                <td>${this.quantity}</td>
                                                <td>$${this.price}</td>
                                                <td>$${this.subtotal}</td>
                                                <td>
                                                <input hidden name="product_id[]" value="${this.id}">
                                                <input hidden name="quantity[]" value="${this.quantity}">
                                                <div style="background-color:#dc3545;border:none;color:white;width:20%;text-align:center;cursor:pointer;" onclick="removeOrder(${this.id})">✘</div>
                                                </td>


                                            </tr>
                            `
            }
        }


        // Nodes (DOM).
        let nodeInputPrice = document.querySelector('[name="price"]')
        let nodeInputQuantity = document.querySelector('[name="quantity"]')
        let nodeInputSubtotal = document.querySelector('[name="subtotal"]')
        let nodeInputTotal = document.querySelector('[name="total_payment"]')
        let nodeListProducts = document.querySelector('#list-products')

        function clearInputFields() {
            nodeInputPrice.value = ''
            nodeInputQuantity.value = ''
            nodeInputSubtotal.value = ''
        }

        const orders = []

        function pushOrder(order) {
            orders.push(Object.assign(Object.create(Object.getPrototypeOf(order)), order));

            let total = 0;
            for (let order of orders) {
                total += order.subtotal;
            }

            document.querySelector('#total-text').innerText = `Total: $${total}`;
            document.querySelector('[name="total_payment"]').value = total;
            nodeInputTotal.value = total;

            nodeListProducts.innerHTML += order.generateHTML();
        }
        function removeOrder(orderId) {
            // Encuentra el índice del pedido en la lista de pedidos
            const index = orders.findIndex(order => order.id === orderId);
            if (index !== -1) {
                // Elimina el pedido de la lista
                orders.splice(index, 1);

                // Recalcula el total
                let total = 0;
                for (let order of orders) {
                    total += order.subtotal;
                }

                // Actualiza la interfaz de usuario
                document.querySelector('#total-text').innerText = `Total: $${total}`;
                document.querySelector('[name="total_payment"]').value = total;
                nodeInputTotal.value = total;

                // Elimina el elemento HTML correspondiente
                const orderElement = document.querySelector(`[data-id="${orderId}"]`);
                if (orderElement) {
                    orderElement.remove();
                }
            }
        }


        let currentOrder = new Order("", "", 0, 0)

        function updateCurrentOrder() {
            nodeInputPrice.value = currentOrder.price
            nodeInputQuantity.value = currentOrder.quantity
            nodeInputSubtotal.value = currentOrder.subtotal
        }

        $(document).ready(function () {
            $('.select2').select2()

            let productSelect = $('#product')
            productSelect.select2();

            $('#add-btn').on("click", (e) => {
                e.preventDefault()

                pushOrder(currentOrder)

                clearInputFields()
                productSelect.val('-')
                productSelect.trigger('change');
            })

            productSelect.on('select2:select', function (e) {
                currentOrder.id = parseInt(productSelect.find(':selected').val())
                currentOrder.name = productSelect.find(':selected').data('name')
                currentOrder.price = parseInt(productSelect.find(':selected').data('price'))
                currentOrder.quantity = 0

                updateCurrentOrder()
            });
        });

        nodeInputQuantity.addEventListener('input', () => {
            currentOrder.quantity = parseInt(nodeInputQuantity.value)
            updateCurrentOrder()
        })
    </script>
@endpush