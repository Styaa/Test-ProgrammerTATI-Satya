<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model implements AuthenticatableContract
{
    //
    use Authenticatable;

    protected $fillable = [
        'nama',
        'jabatan',
        'password',
        'atasan_id',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function atasan()
    {
        return $this->belongsTo(Pegawai::class, 'atasan_id');
    }

    public function performa()
    {
        return $this->hasMany(PerformaPegawai::class, 'pegawai_id');
    }
}
