<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadpdf()
    {
        $transactions = Transaction::orderBy('tanggal', 'desc')->get();

        $total = $transactions->sum('jumlah');
        $totalPemasukan = $transactions->where('jenis_transaksi', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = $transactions->where('jenis_transaksi', 'pengeluaran')->sum('jumlah');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        $pdf = Pdf::loadView('transaction', [
            'transactions' => $transactions,
            'total' => $total,
            'saldoAkhir' => $saldoAkhir,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-transaksi.pdf');
    }
}
