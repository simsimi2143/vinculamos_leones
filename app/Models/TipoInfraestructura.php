<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInfraestructura extends Model
{
    use HasFactory;

    protected $table = 'tipo_infraestructura';

    public $timestamps = false;

    protected $primaryKey = 'tinf_codigo';


    protected $fillable = [
        'tinf_codigo',
        'tinf_nombre',
        'tinf_valor',
        'tinf_visible',
        'tinf_vigente',
        'tinf_creado',
        'tinf_actualizado',
        'tinf_nickname_mod',
        'tinf_rol_mod'
    ];

    protected $attributes = [
        'tinf_visible' => 1, // Establece el valor predeterminado para 'tiac_visible' como 1
    ];
}
