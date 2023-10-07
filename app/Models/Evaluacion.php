<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluacion';

    public $timestamps = false;

    protected $fillable = [
        'eval_codigo',
        'inic_codigo',
        'eval_evaluador',
        'eval_conocimiento_1',
        'eval_conocimiento_2',
        'eval_conocimiento_3',
        'eval_cumplimiento_1',
        'eval_cumplimiento_2',
        'eval_cumplimiento_3',
        'eval_calidad_1',
        'eval_calidad_2',
        'eval_calidad_3',
        'eval_calidad_4',
        'eval_competencia_1',
        'eval_competencia_2',
        'eval_competencia_3',
        'eval_puntaje',
        'eval_creado',
        'eval_actualizado',
        'eval_vigente',
        'eval_nickname_mod',
        'eval_rol_mod'
    ];
}
