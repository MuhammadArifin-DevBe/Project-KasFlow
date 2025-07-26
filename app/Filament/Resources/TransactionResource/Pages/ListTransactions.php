<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Filament\Resources\TransactionResource\Widgets\TransactionSummaryWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            TransactionSummaryWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->color('info'),
            Action::make('Excel')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn() => Excel::download(new TransactionExport, 'Laporan.xlsx')),
            Action::make('Laporan pdf')
                ->label('Laporan PDF')
                ->color('danger')
                ->icon('heroicon-o-document-text')
                ->url(fn() => route('download.pdf'))
                ->openUrlInNewTab(),
        ];
    }
}
