<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    public $timestamps = false;

    protected $primaryKey = 'care_codigo';

    protected $fillable = [
        'care_codigo',
        'escu_codigo',
        'care_nombre',
        'care_descripcion',
        'care_director',
        'care_meta_estudiantes',
        'care_meta_docentes',
        'care_meta_soc_comunitarios',
        'care_meta_benificiarios',
        'care_meta_Iniciativas',
        'care_visible',
        'care_institucion',
        'care_creado',
        'care_actualizado',
        'care_nickname_mod',
        'care_rol_mod'
    ];

    protected $attributes = [
        'care_visible' => 1,
    ];
}
