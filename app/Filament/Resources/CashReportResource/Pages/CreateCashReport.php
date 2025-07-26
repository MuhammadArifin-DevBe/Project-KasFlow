<?php

namespace App\Filament\Resources\CashReportResource\Pages;

use App\Filament\Resources\CashReportResource;
use App\Models\CashReport;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CreateCashReport extends CreateRecord
{
    protected static string $resource = CashReportResource::class;

    protected function handleRecordCreation(array $data): CashReport
    {
        $cash = CashReport::create($data);
        $pdf = Pdf::loadView('kwitansi', ['cash' => $cash]);
        $fileName = 'kwitansi-' . $cash->id . '.pdf';
        $path = "kwitansi/{$fileName}";
        Storage::disk('public')->put($path, $pdf->output());
        $cash->update([
            'bukti' => $path,
        ]);

        return $cash;
    }
}
