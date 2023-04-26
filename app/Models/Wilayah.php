<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $primaryKey = 'kdWilayah';
    protected $table = 'wilayah';
    protected $fillable = [
        'kdPropinsi',
        'kdWilayah',
        'nmWilayah'
    ];
}
