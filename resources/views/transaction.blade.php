<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Laporan Lab</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Satuan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $i => $trx)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ optional($trx->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $trx->keterangan }}</td>
                <td>{{ $trx->satuan ?? '-' }}</td>
                <td>{{ ucfirst($trx->jenis_transaksi) }}</td>
                <td>{{ number_format($trx->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right; font-weight: bold;">Total:</td>
                <td>{{ number_format($total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: right; font-weight: bold;">Saldo Akhir:</td>
                <td>{{ number_format($saldoAkhir, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>