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
}
