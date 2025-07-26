<!DOCTYPE html>
<html>
<head>
    <title>Laporan Arus Kas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Arus Kas</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Kas Masuk</th>
                <th>Kas Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $i => $trx)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $trx->keterangan }}</td>
                    <td>{{ number_format($trx->kas_masuk, 0, ',', '.') }}</td>
                    <td>{{ number_format($trx->kas_keluar, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <p><strong>Saldo Akhir: </strong>Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</p>
</body>
</html>
