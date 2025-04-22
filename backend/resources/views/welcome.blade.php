<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🛒 Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
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

        .table-hover.order-table tbody tr:hover td {
            background-color: #3498db !important;
            color: #ffffff;
            transition: background-color 0.2s ease;
            cursor: pointer;
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
            color: #4e73df;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .btn-action {
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-right: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        #delete-orders-btn {
            background-color: #e74c3c;
            color: white;
        }

        #delete-orders-btn:hover {
            background-color: #c0392b;
        }

        #sync-orders-btn {
            background-color: #3498db;
            color: white;
        }

        #sync-orders-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Order Management</h1>

    <div class="d-flex justify-content-center mb-4">
        <button id="delete-orders-btn" class="btn-action">🗑️ Delete all orders</button>
        <button id="sync-orders-btn" class="btn-action">🔄 Sync orders</button>
    </div>

    @if($orders->isEmpty())
        <div class="alert alert-info" role="alert">No Orders Available</div>
    @else
        <table class="table table-striped table-bordered table-hover order-table">
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
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->app_id }}</td>
                    <td>{{ $order->checkout_id }}</td>
                    <td>{{ $order->confirmation_number }}</td>
                    <td><a href="{{ $order->order_status_url }}" target="_blank" class="link-btn">See Status</a></td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $order->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links('pagination::bootstrap-5') }}
    @endif

    <div>Store link order product:
        <a href="https://balanceinternet.myshopify.com/products/hi" target="_blank">https://balanceinternet.myshopify.com/products/hi</a>
        --------- Password: hi
    </div>
    <div>Git: <a href="https://github.com/HoTuanTB/app" target="_blank">https://github.com/HoTuanTB/app</a></div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
            Watch Demo Video
        </button>
    </div>
    <div><strong>Feature: Sync Orders</strong></div>
    <ul>
        <li>📥 <strong>Sync orders from Shopify to DB</strong>: Use Shopify API</li>
        <li>🔄 <strong>Real-time sync</strong>: Use Webhook for real-time updates</li>
    </ul>


    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Demo Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/eL_TtPCGttY"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

<script>
    document.getElementById('delete-orders-btn').addEventListener('click', function () {
        if (!confirm('Are you sure you want to delete all orders?')) return;
        fetch('/api/delete-orders', {method: 'DELETE', headers: {'Accept': 'application/json'}})
            .then(res => res.ok ? location.reload() : alert('delete orders error'))
            .catch(() => alert('connect error'));
    });

    document.getElementById('sync-orders-btn').addEventListener('click', function () {
        if (!confirm('Are you sure you want sync orders?')) return;
        fetch('/api/sync-orders', {method: 'POST', headers: {'Accept': 'application/json'}})
            .then(res => res.ok ? location.reload() : alert('sync error'))
            .catch(() => alert('connect error'));
    });
</script>

</body>
</html>
