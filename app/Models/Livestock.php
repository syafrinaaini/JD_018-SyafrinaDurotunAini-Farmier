<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return trim($this->jenis.$this->stok.$this->ras.$this->image_path);
    }
}
