<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory; 
    protected $fillable = [
        'tanggal',
        'keterangan',
        'satuan',
        'jenis_transaksi',
        'jumlah',
    ];


     protected $casts = [
        'tanggal' => 'date',
    ];

}
