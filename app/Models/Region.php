<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regiones';

    public $timestamps = false;

    protected $fillable = [
        'regi_codigo',
        'pais_codigo',
        'regi_nombre',
        'regi_creado',
        'regi_actualizado',
        'regi_nickname_mod',
        'regi_rol_mod'
    ];
}
