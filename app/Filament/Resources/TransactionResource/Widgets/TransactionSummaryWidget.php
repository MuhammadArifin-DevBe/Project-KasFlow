<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TransactionSummaryWidget extends BaseWidget
{
     protected static string $view = 'filament.admin.resources.transaction-resource.widgets.transaction-summary-widget';

    protected static ?int $sort = -1; // Tampilkan di bawah

    public function getViewData(): array
    {
        $pemasukan = Transaction::where('jenis_transaksi', 'pemasukan')->sum('jumlah');
        $pengeluaran = Transaction::where('jenis_transaksi', 'pengeluaran')->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        return compact('pemasukan', 'pengeluaran', 'saldo');
    }

    public static function canView(): bool
    {
        return true; // Tampilkan selalu
    }
}
