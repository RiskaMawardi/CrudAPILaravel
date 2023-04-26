<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    use HasFactory;
    protected $primaryKey = 'kdPropinsi';
    protected $table = 'propinsi';
    protected $fillable =[
        'kdPropinsi',
        'nmPropinsi',
    ];
}
