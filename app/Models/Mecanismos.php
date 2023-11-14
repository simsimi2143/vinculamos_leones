<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanismos extends Model
{
    use HasFactory;

    protected $table = 'mecanismos';

    public $timestamps = false;

    protected $primaryKey ='meca_codigo';

    protected $fillable = [
        'meca_codigo',
        'tmec_codigo',
        'meca_nombre',
        'meca_descripcion',
        'meca_puntaje',
        'meca_visible',
        'meca_creado',
        'meca_actualizado',
        'meca_nickname_mod',
        'meca_rol_mod'

    ];
}
