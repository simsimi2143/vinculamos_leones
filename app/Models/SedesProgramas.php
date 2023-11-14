<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedesProgramas extends Model
{
    use HasFactory;

    protected $table = 'sedes_progrmas';

    public $timestamps = false;

    protected $fillable = [
        'sede_codigo',
        'prog_codigo',
        'sepr_creado',
        'sepr_actualizado',
        'sepr_nickname_mod',
        'sepr_rol_mod'
    ];
}
