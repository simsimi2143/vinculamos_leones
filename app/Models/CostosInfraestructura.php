<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostosInfraestructura extends Model {
    use HasFactory;

    protected $table = 'costos_infraestructura';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'enti_codigo',
        'tinf_codigo',
        'coin_horas',
        'coin_cantidad',
        'coin_valorizacion',
        'coin_creado',
        'coin_actualizado',
        'coin_vigente',
        'coin_nickname_mod',
        'coin_rol_mod'
    ];
}
