<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $primaryKey = 'nik';
    protected $table = 'penduduk';
    protected $fillable = [
        'nik',
        'nama',
        'tmplahir',
        'tgllahir',
        'jeniskel',
        'darah',
        'alamat',
        'rt',
        'rw',
        'desa',
        'camat',
        'propinsi',
        'agama',
        'stanikah',
        'pekerjaan',
        'wrgnegara',
        'tglBerlaku'
    ];
}
