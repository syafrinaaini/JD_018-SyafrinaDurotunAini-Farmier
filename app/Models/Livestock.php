<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id',
        'jenis',
        'ras',
        'stok',
        'image_path',
    ];

    protected $casts = [
        'stok' => 'integer',
    ];

    public function getNamaLengkapAttribute(): string
    {
        return "{$this->jenis} - {$this->ras} (Stok: {$this->stok})";
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id', 'id');
    }
}
