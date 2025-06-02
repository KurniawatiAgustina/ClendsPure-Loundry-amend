<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        /* Gunakan ukuran kertas kecil (misalnya 80 mm x auto) */
        @page {
            size: 80mm auto;
            margin: 5mm 2mm;
        }
        body {
            font-family: "Courier New", Courier, monospace;
            font-size: 11px;
            line-height: 1.2;
            color: #000;
            margin: 0;
            padding: 0;
            width: 78mm; /* Sisakan sedikit margin */
        }
        .center {
            text-align: center;
        }
        .dashed {
            border-top: 1px dashed #000;
            margin: 4px 0;
        }
        .fields {
            /* untuk dua kolom: label di kiri, value di kanan */
            display: flex;
            justify-content: space-between;
        }
        .fields .label {
            text-align: left;
        }
        .fields .value {
            text-align: right;
        }
        .items, .summary {
            width: 100%;
            margin-top: 4px;
        }
        .items .row {
            display: flex;
            justify-content: space-between;
        }
        .items .row .desc {
            flex: 1;
        }
        .items .row .qty {
            width: 18%;
            text-align: center;
        }
        .items .row .amount {
            width: 22%;
            text-align: right;
        }
        .footer-text {
            font-size: 10px;
            margin-top: 6px;
        }
        /* Supaya PDF-nya tidak memotong isi: */
        .no-break {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

    {{-- Logo --}}
    <div class="center">
        <img src="{{ public_path('invoice_logo.png') }}" alt="Logo" style="width: 40px; height: auto; margin-bottom: 4px;">
    </div>

    {{-- Nama Toko --}}
    <div class="center">
        CLEDS.ID
    </div>

    {{-- Subtitle --}}
    <div class="center" style="margin-top: 2px; margin-bottom: 4px;">
        CUCI &amp; REPARASI SEPATU TAS HELM
    </div>

    {{-- Garis dash --}}
    <div class="dashed"></div>

    {{-- Bagian informasi header --}}
    <div class="fields">
        <div class="label">Pembeli</div>
        <div class="value">{{ $order->customer->name }}</div>
    </div>
    <div class="fields">
        <div class="label">Pembayaran</div>
        <div class="value">{{ ucfirst($order->payment_method) }}</div>
    </div>
    <div class="fields">
        <div class="label">Tanggal</div>
        <div class="value">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</div>
    </div>
    <div class="fields">
        <div class="label">Kasir</div>
        <div class="value">CLEDS.ID</div>
    </div>

    {{-- Garis dash --}}
    <div class="dashed"></div>

    {{-- Daftar barang/layanan --}}
    <div class="items no-break">
        @foreach($order->details as $i => $detail)
            @php
                $namaLayanan = $detail->service->name ?? '-';
                $qty        = $detail->quantity;
                $subtotal   = number_format($detail->subtotal, 0, ',', '.');
            @endphp
            {{-- Judul layanan (hanya sekali, no kolom #) --}}
            @if($i === 0)
                {{-- Baris pertama: tulis nama layanan --}}
                <div class="row">
                    <div class="desc" style="font-weight: bold;">{{ strtoupper($namaLayanan) }}</div>
                </div>
            @endif

            {{-- Baris detail kuantitas & harga --}}
            <div class="row" style="margin-top: 2px;">
                <div class="desc">&nbsp;&nbsp;{{ number_format($detail->subtotal / $qty,0,',','.') }} x {{ $qty }}</div>
                <div class="amount">{{ $subtotal }}</div>
            </div>
        @endforeach
    </div>

    {{-- Garis dash --}}
    <div class="dashed"></div>

    {{-- Ringkasan total --}}
    <div class="summary">
        <div class="fields">
            <div class="label">TOTAL {{ $order->details->sum('quantity') }} QTY</div>
            <div class="value">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>
        <div class="fields">
            <div class="label">Bayar</div>
            <div class="value">Rp {{ number_format($order->payment_amount ?? $order->total_price, 0, ',', '.') }}</div>
            {{-- Asumsi Anda punya field payment_amount; kalau tidak, gunakan total_price --}}
        </div>
        <div class="fields">
            <div class="label">Kembali</div>
            <div class="value">Rp {{ number_format(($order->payment_amount ?? $order->total_price) - $order->total_price, 0, ',', '.') }}</div>
        </div>
    </div>

    {{-- Garis dash --}}
    <div class="dashed"></div>

    {{-- Keterangan tambahan --}}
    @if(! empty($order->notes))
    <div style="margin-top: 2px;">
        <strong>Keterangan</strong>
        <div style="margin-left: 4px; margin-top: 2px;">
            {!! nl2br(e($order->notes)) !!}
        </div>
        <div class="dashed" style="margin-top: 2px;"></div>
    </div>
    @endif

    {{-- Catatan Perhatian --}}
    <div class="footer-text no-break">
        <strong>PERHATIAN :</strong>
        <div style="margin-left: 4px; margin-top: 2px;">
            - Komplain Cuci Maksimal H+1<br>
            - Garansi Repair H+20<br>
            - Barang Yang Tidak Diambil Lebih Dari 2 Bulan Tidak Menjadi Tanggung Jawab Kami
        </div>
    </div>

</body>
</html>
