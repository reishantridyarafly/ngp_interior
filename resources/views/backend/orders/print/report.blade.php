<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGP Interior - Penawaran Harga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 11px;
        }

        .header {
            width: 100%;
        }

        .logo {
            height: 80px;
            float: left;
            margin-right: 10px;
        }

        .company-info {
            float: left;
        }

        .company-info p {
            margin: 2px 0;
        }

        .right-section {
            float: right;
            text-align: right;
            margin-top: -10px;
        }

        .price-offer-title {
            font-size: 14px;
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding: 3px 0;
            margin-bottom: 10px;
            width: 200px;
            float: right;
            text-align: left;
        }

        .details-table {
            clear: right;
            float: right;
            border-collapse: collapse;
            margin-top: 25px;
        }

        .details-table td {
            padding: 3px 15px 3px 0;
            text-align: left;
        }

        .details-table .value {
            padding-right: 0;
        }

        .header-line {
            clear: both;
            border-bottom: 2px solid #000;
            margin-top: 20px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11px;
        }

        .content-table th,
        .content-table td {
            border: 1px solid black;
            padding: 5px;
        }

        .content-table th {
            text-align: center;
            background-color: white;
        }

        .table-title {
            text-align: center;
            font-weight: bold;
            padding: 5px;
            margin-top: 20px;
            font-size: 20px;
        }

        .section-header {
            background-color: #e0e0e0;
            font-weight: bold;
        }

        .notes {
            padding-left: 20px;
            font-style: italic;
        }

        .subtotal-row {
            font-weight: bold;
        }

        .number-column {
            text-align: right;
        }

        .center-column {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header clearfix">
        <img src="{{ public_path('backend/assets/images/LOGO_NGP.png') }}" alt="NGP Interior Logo" class="logo">
        <div class="company-info">
            <p style="font-weight: bold;">NGP INTERIOR</p>
            <p>Interior & General Contractor</p>
            <p>Ruko Ciharendong No 78 Kuningan Jawa Barat</p>
            <p>Telp: 0813 8117 5252</p>
            <p>email: ngpinterior@gmail.com</p>
        </div>

        <!-- Bottom Line -->
        <div class="header-line"></div>

        <div class="table-title">LAPORAN PEMESANAN</div>
        <table class="content-table">
            <tr>
                <th style="width: 5%;">NO.</th>
                <th style="width: 15%;">INVOICE</th>
                <th style="width: 20%;">NAMA</th>
                <th style="width: 15%;">LOKASI</th>
                <th style="width: 15%;">TANGGAL</th>
                <th style="width: 15%;">JUMLAH<br>Rp.</th>
            </tr>
            @forelse ($orders as $order)
                <tr>
                    <td style="width: 5%;text-align: center;">{{ $loop->iteration }}</td>
                    <td style="width: 15%;">{{ $order->invoice }}</td>
                    <td style="width: 20%;">{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
                    <td style="width: 15%;">{{ $order->location }}</td>
                    <td style="width: 15%;">{{ \Carbon\Carbon::parse($order->order_date)->format('d F Y') }}</td>
                    <td style="width: 15%;text-align: right;">
                        {{ $order->sections->sum('total_amount') ? number_format($order->sections->sum('total_amount'), 0, ',', '.') : 0 }}
                    </td>
                </tr>
                <tr class="subtotal-row">
                    <td colspan="5" style="text-align: right;">Total Keseluruhan</td>
                    <td class="number-column">
                        {{ $total ? number_format($total, 0, ',', '.') : 0 }}
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="6" style="text-align: center">Data tidak tersedia</th>
                </tr>
            @endforelse
        </table>
    </div>
</body>

</html>
