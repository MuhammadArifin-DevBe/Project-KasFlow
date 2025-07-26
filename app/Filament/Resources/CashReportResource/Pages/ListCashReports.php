<?php

namespace App\Filament\Resources\CashReportResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CashReportResource;
use App\Models\CashReport;

class ListCashReports extends ListRecords
{
    protected static string $resource = CashReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
             Action::make('Excel')
                ->color('success')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn() => Excel::download(new Ca(), 'ArusKas.xlsx')),
                Action::make('ArusKas pdf')
                ->label('ArusKas PDF')
                ->color('danger')
                ->icon('heroicon-o-document-text')
                ->url(fn() => route('aruskas.pdf'))
                ->openUrlInNewTab(),
        ];
    }
}
