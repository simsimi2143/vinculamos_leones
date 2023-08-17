<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasContribuciones extends Model
{
    use HasFactory;

    protected $table = 'programas_contribuciones';

    public $timestamps = false;

    protected $fillable = [
        'prog_codigo',
        'amb_codigo ',
        'proco_creado',
        'proco_actualizado',
        'proco_nickname_mod',
        'proco_rol_mod'

    ];
}
