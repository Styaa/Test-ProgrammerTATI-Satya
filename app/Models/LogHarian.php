<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHarian extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kegiatan',
        'pegawai_id',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function verifikator()
    {
        return $this->belongsTo(Pegawai::class, 'verifikator_id');
    }
}
