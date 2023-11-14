<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbitosAccion extends Model
{
    use HasFactory;

    protected $table = 'ambito_accion';

    protected $primaryKey = 'amac_codigo';

    public $timestamps = false;

    protected $fillable = [
        'amac_codigo',
        'amac_nombre',
        'amac_descripcion',
        'amac_director',
        'amac_creado',
        'amac_actualizado',
        'amac_visible',
        'amac_nickname_mod',
        'amac_rol_mod'
    ];
}
