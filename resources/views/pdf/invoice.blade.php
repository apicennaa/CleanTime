<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f4f4f4;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Invoice</h1>
        <p>CleanTime Service</p>
    </div>

    <table class="table">
        <tr>
            <th>Service Name</th>
            <td>{{ $service_name }}</td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td>{{ $full_name }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $phone }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $address }}</td>
        </tr>
        <tr>
            <th>Service Date</th>
            <td>{{ $service_date }}</td>
        </tr>
        <tr>
            <th>Service Time</th>
            <td>{{ $service_time }}</td>
        </tr>
        {{-- <tr>
            <th>Status</th>
            <td>{{ $status }}</td>
        </tr> --}}
        <tr>
            <th>Payment Method</th>
            <td>{{ $payment_method }}</td>
        </tr>
        <tr>
            <th>Service Price</th>
            <td>Rp {{ number_format($service_price, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Thank you for using CleanTime Service!</p>
    </div>
</body>

</html>
