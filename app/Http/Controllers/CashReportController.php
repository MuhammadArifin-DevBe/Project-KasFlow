<?php

namespace App\Http\Controllers;

use App\Models\CashReport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CashReportController extends Controller
{
    public function downloadpdf()
    {
        $transactions = CashReport::latest()->get();

        $totalPemasukan = $transactions->sum('kas_masuk');
        $totalPengeluaran = $transactions->sum('kas_keluar');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        $pdf = Pdf::loadView('cashreport', [
            'transactions' => $transactions,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'saldoAkhir' => $saldoAkhir,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('laporan-arus-kas.pdf');
    }
}
