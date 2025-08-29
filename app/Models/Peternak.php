<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peternak',
        'nama_peternakan',
        'email',
        'nomor_hp',
        'alamat',
        'keterangan',
    ];
}

