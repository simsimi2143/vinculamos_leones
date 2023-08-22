<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mecanismos;

class Iniciativas extends Model
{
    use HasFactory;

    protected $table = 'iniciativas';
    protected $primaryKey = 'inic_codigo';
    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'conv_codigo',
        'prog_codigo',
        'meca_codigo',
        'inic_nombre',
        'inic_territorio',
        'inic_descripcion',
        'inic_estado',
        'inic_anho',
        'inic_creado',
        'inic_actualizado',
        'inic_nickname_mod',
        'inic_rol_mod'
    ];
}
