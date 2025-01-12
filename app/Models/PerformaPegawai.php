<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformaPegawai extends Model
{
    //
    use HasFactory;

    protected $fillable = ['pegawai_id', 'hasil_kerja', 'perilaku', 'predikat_kinerja'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
