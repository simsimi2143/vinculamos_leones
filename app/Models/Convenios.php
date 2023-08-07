<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    use HasFactory;

    protected $table = 'convenios';

    public $timestamps = false;

    protected $fillable = [
        'conv_codigo',
        'conv_nombre',
        'conv_descripcion',
        'conv_tipo',
        'conv_nombre_archivo',
        'conv_ruta_archivo',
        'conv_creado',
        'conv_actualizado',
        'conv_visible',
        'conv_nickname_mod',
        'conv_rol_mod'
    ];
}
