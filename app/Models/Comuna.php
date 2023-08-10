<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

    protected $table = 'comunas';

    public $timestamps = false;

    protected $fillable = [
        'comu_codigo',
        'regi_codigo',
        'comu_nombre',
        'comu_creado',
        'comu_actualizado',
        'comu_nickname_mod',
        'comu_rol_mod'
    ];
}
