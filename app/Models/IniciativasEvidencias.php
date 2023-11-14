<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasEvidencias extends Model
{
    use HasFactory;
    protected $table = 'iniciativas_evidencias';

    public $timestamps = false;

    protected $fillable = [
        'inev_codigo',
        'inic_codigo',
        'inev_nombre',
        'inev_descripcion',
        'inev_ruta',
        'inev_mime',
        'inev_nombre_origen',
        'inev_creado',
        'inev_actualizado',
        'inev_visible',
        'inev_nickname_mod',
        'inev_rol_mod'
    ];
}
