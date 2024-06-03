<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        table,
        th,
        td {
            border-bottom: 1px solid #9D9D9D;
            border-collapse: collapse;
        }

        table {
            width: 100%;
            border: 1px solid #9D9D9D;
        }

        th,
        td {
            padding: 5px;
        }

        td {
            text-align: center;

        }
        th{
            color:white;
        }

        tr {
            border-bottom: 1px solid #ddd;
        }

    </style>
</head>

<body>
    <div style="display: flex;justify-content: space-around; width: 100%;">
        <div style="display: flex;">
            <h2
                style="background-color: #ff98a2; display: flex; align-items: center; padding: 2px 10px; text-align:center">
                Purchase Invoice</h2>
            <h2>
                Esthyan
                <h2 style="color: #dc3545">Pharmacy</h2>
            </h2>
        </div>
    </div>

    <p>
        <b>Date of sale:</b> {{ $order->date_of_sale }}
    </p>
    <p>
        <b>Customer's name:</b>{{$customer->name}}
    </p>
    <p><b>Identification Document:</b>{{$customer->identification_document}}</p>

    <table>
        <thead>
            <tr>
                <th style="background-color:#dc3545;" scope="col">Product</th>
                <th style="background-color:#dc3545;" scope="col">Price</th>
                <th style="background-color:#dc3545;" scope="col">Quantity</th>
                <th style="background-color:#dc3545;" scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td> ${{ $detail->product->price_sale }} </td>
                    <td> {{ $detail->quantity }} </td>
                    <td>${{ $detail->product->price_sale * $detail->quantity }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div style="background-color: rgb(173, 173, 173);font-size: 20px;text-align: center;">
        <p><b>Total Payment:</b>{{$order->total_payment}}</p>
    </div>
</body>

</html>