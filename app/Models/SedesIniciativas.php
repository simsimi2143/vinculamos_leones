<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedesIniciativas extends Model
{
    use HasFactory;

    protected $table = 'sedes_iniciativas';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'sede_codigo',
        'sein_creado',
        'sein_actualizado',
        'sein_nickname_mod',
        'sein_rol_mod'
    ];
}
