<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table {
            margin-top: 30px;
            width: 100%;
        }

        td, th {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .order-table {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .table th {
            background-color: #4e73df;
            color: #fff;
            font-weight: bold;
        }

        .table td {
            background-color: #f9fafb;
            color: #495057;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f3f5;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .table tbody tr:hover {
            background-color: #e2edff !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .table a.link-btn {
            color: #28a745;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 5px;
            padding: 5px 10px;
            background-color: #e8f9e8;
        }

        .table a.link-btn:hover {
            background-color: #28a745;
            color: #fff;
            transform: scale(1.05);
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            font-size: 1.2rem;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
        }

        .container h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

    </style>
</head>

<body>

<div class="container">
    <h1 class="animate__animated animate__fadeInDown">Order Management</h1>

    @if($orders->isEmpty())
        <div class="alert alert-info animate__animated animate__fadeIn" role="alert">
            No Orders Available
        </div>
    @else
        <table class="table table-striped table-bordered order-table animate__animated animate__fadeInUp">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Order Number</th>
                <th>App ID</th>
                <th>Checkout ID</th>
                <th>Confirmation Number</th>
                <th>Order Status URL</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.05 }}s">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->app_id }}</td>
                    <td>{{ $order->checkout_id }}</td>
                    <td>{{ $order->confirmation_number }}</td>
                    <td>
                        <a href="{{ $order->order_status_url }}" target="_blank" class="link-btn">See Status</a>
                    </td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $order->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links('pagination::bootstrap-5') }}

        <div>(Store) Link order : <a href="https://balanceinternet.myshopify.com/products/hi" target="_blank">https://balanceinternet.myshopify.com/products/hi</a></div>
        <div>Password : hi<div>
        <div>Demo : <a href="https://github.com/HoTuanTB/app" target="_blank">https://github.com/HoTuanTB/app</a></div>

    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>
