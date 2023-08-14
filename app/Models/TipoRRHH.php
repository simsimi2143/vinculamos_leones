<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRRHH extends Model
{
    use HasFactory;

    protected $table = 'tipo_rrhh';

    public $timestamps = false;

    protected $primaryKey = 'trrhh_codigo';


    protected $fillable = [
        'trrhh_codigo',
        'trrhh_nombre',
        'trrhh_visible',
        'trrhh_creado',
        'trrhh_actualizado',
        'trrhh_nickname_mod',
        'trrhh_rol_mod'
    ];

    protected $attributes = [
        'trrhh_visible' => 1, // Establece el valor predeterminado para 'tiac_visible' como 1
    ];
}
