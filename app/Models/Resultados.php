<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;
    protected $table = 'resultados';

    protected $primaryKey = 'resu_codigo';
    public $timestamps = false;

    protected $fillable = [
        'resu_codigo',
        'inic_codigo',
        'resu_nombre',
        'resu_cuantificacion_inicial',
        'resu_cuantificacion_final',
        'resu_creado',
        'resu_actualizado',
        'resu_visible',
        'resu_nickname_mod',
        'resu_rol_mod'
    ];
}
