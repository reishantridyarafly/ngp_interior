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

        .footer {
            margin-top: 30px;
        }

        .footer-text {
            margin-bottom: 10px;
        }

        .footer-logo {
            width: 150px;
            height: auto;
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

        <!-- Right Section -->
        <div class="right-section">
            <div class="price-offer-title">PENAWARAN HARGA</div>
            <table class="details-table">
                <tr>
                    <td>Tgl</td>
                    <td>:</td>
                    <td class="value">{{ \Carbon\Carbon::now()->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Nama Customer</td>
                    <td>:</td>
                    <td class="value">{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
                </tr>
                <tr>
                    <td>Lokasi Project</td>
                    <td>:</td>
                    <td class="value">{{ $order->location }}</td>
                </tr>
            </table>
        </div>

        <!-- Bottom Line -->
        <div class="header-line"></div>

        <div class="table-title">DETAIL ITEM SPESIFIKASI</div>
        <table class="content-table">
            <tr>
                <th style="width: 5%;">NO.</th>
                <th style="width: 45%;">U R A I A N</th>
                <th style="width: 20%;" colspan="2">RENCANA PEKERJAAN</th>
                <th style="width: 15%;">HARGA SATUAN<br>Rp.</th>
                <th style="width: 15%;">JUMLAH<br>Rp.</th>
            </tr>
            <tr>
                <td class="center-column">1</td>
                <td class="center-column">2</td>
                <td class="center-column">3</td>
                <td class="center-column">4</td>
                <td class="center-column">5</td>
                <td class="center-column">6</td>
            </tr>
            @foreach ($sections as $key => $section)
                <tr class="section-header">
                    <td style="text-align: center">{{ chr(65 + $key) }}</td>
                    <td colspan="5">{{ $section->section_title }}</td>
                </tr>

                @foreach ($items->where('section_id', $section->id) as $item)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td>{{ $item->description }}</td>
                        <td style="text-align: center">{{ $item->volume }}</td>
                        <td style="text-align: center">{{ $item->unit }}</td>
                        <td class="number-column">
                            {{ $item->unit_price ? number_format($item->unit_price, 0, ',', '.') : 0 }}
                        </td>
                        <td class="number-column">
                            {{ $item->subtotal ? number_format($item->subtotal, 0, ',', '.') : 0 }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td colspan="4">Notes :<br>
                        {{ $section->note }}
                    </td>
                    <td></td>
                </tr>

                <tr class="subtotal-row">
                    <td colspan="5" style="text-align: right;">Subtotal</td>
                    <td class="number-column">
                        {{ $section->subtotal ? number_format($section->subtotal, 0, ',', '.') : 0 }}
                    </td>
                </tr>
                <tr class="subtotal-row">
                    <td colspan="5" style="text-align: right;">Diskon</td>
                    <td class="number-column">
                        {{ $section->discount ? number_format($section->discount, 0, ',', '.') : 0 }}
                    </td>
                </tr>
                <tr class="subtotal-row">
                    <td colspan="5" style="text-align: right;">Total</td>
                    <td class="number-column">
                        {{ $section->total_amount ? number_format($section->total_amount, 0, ',', '.') : 0 }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <div class="footer-text">Hormat Kami,</div>
        <div>
            <img src="{{ public_path('backend/assets/images/LOGO_NGP.png') }}" alt="NGP Interior Logo"
                class="footer-logo">
        </div>
        <div>Firdaus Rochman</div>
    </div>
</body>

</html>
