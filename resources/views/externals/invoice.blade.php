<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $transaction->id }}</title>
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
    <p>Invoice #{{ $transaction->id }} &bull; {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</p>
    <hr>
</header>

<table class="customer">
    <tr>
        <td><strong>Customer:</strong> {{ $transaction->customer_name }}</td>
        <td><strong>Phone:</strong> {{ $transaction->customer_phone }}</td>
    </tr>
    <tr>
        <td><strong>Payment Method:</strong> {{ ucfirst($transaction->payment_method) }}</td>
        <td><strong>Status:</strong> {{ ucfirst($transaction->status) }}</td>
    </tr>
</table>

<table class="period">
    <tr>
        <td><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($transaction->start_time)->format('d M Y H:i') }}</td>
        <td><strong>Selesai:</strong> {{ \Carbon\Carbon::parse($transaction->end_time)->format('d M Y H:i') }}</td>
    </tr>
</table>

<table class="items">
    <thead>
        <tr>
            <th style="width:5%">#</th>
            <th>Layanan</th>
            <th style="width:15%">Harga</th>
            <th style="width:10%">Qty</th>
            <th style="width:15%">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaction->details as $i => $detail)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $detail->service->name }}</td>
            <td>Rp {{ number_format($detail->price,0,',','.') }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>Rp {{ number_format($detail->total_price,0,',','.') }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" style="text-align:right">Total Harga</td>
            <td>Rp {{ number_format($transaction->total_price,0,',','.') }}</td>
        </tr>
    </tfoot>
</table>

<footer>
    <p>Terima kasih telah menggunakan layanan CledsPure!</p>
</footer>

</body>
</html>
