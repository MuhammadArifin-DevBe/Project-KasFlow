<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'keterangan',
        'kas_masuk',
        'kas_keluar',
        'bukti',
    ];
}
