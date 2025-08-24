<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananPpob extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'brand',
        'layanan',
        'provider_id',
        'tipe_layanan',
        'tipe',
        'harga',
        'harga_reseller',
        'status',
        'provider'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
