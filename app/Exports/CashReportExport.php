<?php

namespace App\Exports;

use App\Models\CashReport;
use Maatwebsite\Excel\Concerns\FromCollection;

class CashReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CashReport::all();
    }
}
