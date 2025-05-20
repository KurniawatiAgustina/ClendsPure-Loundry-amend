<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        header { text-align: center; margin-bottom: 20px; }
        h1 { margin: 0; }
        .meta, .customer, .period { width: 100%; margin-bottom: 10px; }
        .meta td, .customer td, .period td { padding: 4px 0; }
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        /* atur lebar kolom dengan colgroup */
        table.items colgroup col:nth-child(1) { width: 5%; }
        table.items colgroup col:nth-child(2) { width: auto; } /* layanan melebar */
        table.items colgroup col:nth-child(3) { width: 10%; }  /* Qty */
        table.items colgroup col:nth-child(4) { width: 15%; }  /* Subtotal */
        table.items th, table.items td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        table.items th { background: #f0f0f0; }
        tfoot td { font-weight: bold; }
        footer { text-align: center; font-size: 10px; color: #666; }
    </style>
</head>
<body>

<header>
    <h1>CLEDSPURE Invoice</h1>
    <p>Invoice #{{ $order->id }} &bull; {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</p>
    <hr>
</header>

<table class="customer">
    <tr>
        <td><strong>Customer:</strong> {{ $order->customer->name }}</td>
        <td><strong>Phone:</strong> {{ $order->customer->phone }}</td>
    </tr>
    <tr>
        <td><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</td>
        <td><strong>Status:</strong> {{ ucfirst($order->status) }}</td>
    </tr>
</table>

<table class="period">
    <tr>
        <td><strong>Cabang:</strong> {{ $order->branch->name }}</td>
    </tr>
</table>

<table class="items">
    <!-- colgroup untuk mengatur lebar kolom -->
    <colgroup>
        <col>    <!-- # -->
        <col>    <!-- layanan (melebar otomatis) -->
        <col>    <!-- Qty -->
        <col>    <!-- Subtotal -->
    </colgroup>

    <thead>
        <tr>
            <th>#</th>
            <th>Layanan</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->details as $i => $detail)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $detail->service->name ?? '' }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>Rp {{ number_format($detail->subtotal,0,',','.') }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="text-align:right">Total Harga</td>
            <td>Rp {{ number_format($order->total_price,0,',','.') }}</td>
        </tr>
    </tfoot>
</table>

<footer>
    <p>Terima kasih telah menggunakan layanan CLEDSPURE!</p>
</footer>

</body>
</html>
