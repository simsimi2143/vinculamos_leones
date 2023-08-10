<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MecanismosActividades extends Model
{
    use HasFactory;

    protected $table = 'mecanismos_actividades';

    public $timestamps = false;

    protected $fillable = [
        'prog_codigo',
        'tiac_codigo',
        'meac_creado',
        'meac_actualizado',
        'meac_nickname_mod',
        'meac_rol_mod'

    ];
}
