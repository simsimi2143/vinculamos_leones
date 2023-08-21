<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostosRrhh extends Model {
    use HasFactory;

    protected $table = 'costos_rrhh';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'enti_codigo',
        'trrhh_codigo',
        'corh_horas',
        'corh_cantidad',
        'corh_valorizacion',
        'corh_creado',
        'corh_actualizado',
        'corh_vigente',
        'corh_rut_mod',
        'corh_rol_mod'
    ];
}
