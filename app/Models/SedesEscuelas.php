<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedesEscuelas extends Model
{
    use HasFactory;

    protected $table = 'sedes_escuelas';

    public $timestamps = false;

    protected $fillable = [
        'sede_codigo',
        'escu_codigo',
        'seec_creado',
        'seec_actualizado',
        'seec_nickname_mod',
        'seec_rol_mod'
    ];
}
