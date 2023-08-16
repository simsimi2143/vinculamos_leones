<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostosDinero extends Model {
    use HasFactory;

    protected $table = 'costos_dinero';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'enti_codigo',
        'codi_valorizacion',
        'codi_creado',
        'codi_actualizado',
        'codi_vigente',
        'codi_nickname_mod',
        'codi_rol_mod'
    ];
}
