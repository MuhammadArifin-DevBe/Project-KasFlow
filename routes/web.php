<?php

use App\Models\CashReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('download', [PDFController::class, 'downloadpdf'])->name('download.pdf');
Route::get('/download-kwitansi/{id}', function ($id) {
    $cash = CashReport::findOrFail($id);

    if (!$cash->bukti || !Storage::disk('public')->exists($cash->bukti)) {
        abort(404, 'File kwitansi tidak ditemukan');
    }

    return response()->download(storage_path('app/public/' . $cash->bukti));
})->name('kwitansi.download');
// Route::get('/download/kwitansi/{id}', function ($id) {
//     $cash = CashReport::findOrFail($id);

//     if (!$cash->bukti || !Storage::disk('public')->exists($cash->bukti)) {
//         abort(404, 'File kwitansi tidak ditemukan.');
//     }

//     return response()->download(storage_path('app/public/' . $cash->bukti));
// })->name('kwitansi.forceDownload');