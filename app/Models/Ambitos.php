<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambitos extends Model
{
    use HasFactory;

    protected $table = 'ambito';

    protected $primaryKey = 'amb_codigo';

    public $timestamps = false;

    protected $fillable = [
        'amb_codigo',
        'amb_nombre',
        'amb_descripcion',
        'amb_director',
        'amb_creado',
        'amb_actualizado',
        'amb_visible',
        'amb_nickname_mod',
        'amb_rol_mod'
    ];
}
