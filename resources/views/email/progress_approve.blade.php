<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penerimaan Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #00bcd4;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            color: #333333;
            font-size: 20px;
        }

        .content p {
            color: #666666;
            font-size: 16px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            background-color: #00bcd4;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
        }

        .footer {
            background-color: #f7f7f7;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Terima Kasih Telah Memilih NGP Interior</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <h2>Halo {{ $data['name'] }},</h2>
            <p>Terima kasih telah memilih <strong>NGP Interior</strong> untuk kebutuhan perlengkapan interior dan
                ekterior Anda! Kami dengan senang hati mengonfirmasi bahwa <strong>{{ $data['status_name'] }}</strong>
                pesanan Anda telah berhasil
                diterima dan sedang dalam proses selanjutnya.</p>
            <p>Pesanan Anda akan segera diproses lebih lanjut dan kami akan memberikan pembaruan secara berkala mengenai
                progres pengerjaan. Anda akan menerima informasi lebih lanjut melalui email ini, jadi pastikan untuk
                memeriksa inbox Anda secara rutin.</p>
            <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi tambahan, jangan ragu untuk menghubungi kami
                melalui tombol di bawah ini.</p>
            <a href="http://wa.me/6281381175252" class="btn" style="color: white;">Hubungi Kami</a>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; NGP Interior Design 2024 | All Rights Reserved.
            </p>
        </div>
    </div>
</body>

</html>
