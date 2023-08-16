<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    use HasFactory;

    protected $table = "entidades";

    public $timestamps = false;

    protected $fillable = [
        'enti_codigo',
        'enti_nombre',
        'enti_creado',
        'enti_actualizado',
        'enti_vigente',
        'enti_rut_mod',
        'enti_rol_mod'
    ];
}
