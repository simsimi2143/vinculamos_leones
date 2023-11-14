<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasPais extends Model
{
    use HasFactory;

    protected $table = 'iniciativas_pais';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'pais_codigo',
        'pain_creado',
        'pain_actualizado',
        'pais_nickname_mod',
        'pain_rol_mod',
    ];
}
