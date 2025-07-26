<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kwitansi</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; padding: 20px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="title">KWITANSI PEMBAYARAN</div>
    <p><strong>Nomor:</strong> {{ $cash->id }}</p>
    <p><strong>Tanggal:</strong> {{ $cash->created_at->format('d-m-Y') }}</p>
    <p><strong>Keterangan:</strong> {{ $cash->keterangan }}</p>
    <p><strong>Kas Masuk:</strong> Rp {{ number_format($cash->kas_masuk, 0, ',', '.') }}</p>
    <p><strong>Kas Keluar:</strong> Rp {{ number_format($cash->kas_keluar, 0, ',', '.') }}</p>
    <br><br>
    <p style="text-align:right;">Banjarmasin, {{ $cash->created_at->format('d F Y') }}</p>
    <p style="text-align:right;">________________________</p>
</body>
</html>
