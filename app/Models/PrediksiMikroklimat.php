<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrediksiMikroklimat extends Model
{
    protected $table = 'prediksi_mikroklimat';

    protected $fillable = [
        'lokasi',
        'nama_tanaman',
        'suhu_udara',
        'kelembapan_udara',
        'kelembapan_tanah',
        'status_mikroklimat',
    ];

    /**
     * Rekomendasi tidak disimpan di tabel; diturunkan dari status.
     */
    public function getRekomendasiAttribute(): string
    {
        return match ($this->status_mikroklimat) {
            'Kering'  => 'Segera lakukan penyiraman atau irigasi',
            'Optimal' => 'Pertahankan pola perawatan saat ini',
            default   => 'Kurangi penyiraman dan periksa drainase',
        };
    }
}
