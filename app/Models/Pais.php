<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'pais';

    public $timestamps = false;

    protected $fillable = [
        'pais_codigo',
        'pais_nombre',
        'pais_creado',
        'pais_actualizado',
        'pais_nickname_mod',
        'pais_rol_mod'
    ];
}
