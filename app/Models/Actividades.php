<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;

    protected $table = 'actividades'; // Nombre de la tabla en la base de datos

    public $timestamps = false;

    protected $primaryKey = 'acti_codigo'; // Clave primaria de la tabla

    protected $fillable = [
        'acti_codigo',
        'acti_nombre',
        'acti_fecha',
        'acti_acuerdos',
        'acti_fecha_cumplimiento',
        'acti_avance',
        'acti_creado',
        'acti_actualizado',
        'acti_visible',
        'acti_nickname_mod',
        'acti_rol_mod',
    ];

    protected $attributes = [
        'acti_visible' => 1, // Valor predeterminado para acti_visible
    ];
}
