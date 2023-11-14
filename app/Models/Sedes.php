<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    use HasFactory;

    protected $table = 'sedes';

    public $timestamps = false;

    protected $primaryKey = 'sede_codigo'; // Especificar el nombre de la clave primaria

    protected $fillable = [
        'sede_codigo',
        'sede_nombre',
        'sede_descripcion',
        'sede_meta_estudiantes',
        'sede_meta_docentes',
        'sede_meta_socios',
        'sede_meta_iniciativas',
        'sede_visible',
        'sede_creado',
        'sede_actualizado',
        'sede_nickname_mod',
        'sede_rol_mod',
    ];

    protected $attributes = [
        'sede_visible' => 1, // Valor predeterminado para sede_visible
    ];
}

