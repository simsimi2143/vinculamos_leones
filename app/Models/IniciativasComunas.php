<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasComunas extends Model
{
    use HasFactory;

    protected $table = 'iniciativas_comunas';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'comu_codigo',
        'coin_creado',
        'coin_actualizado',
        'coin_nickname_mod',
        'coin_rol_mod'

    ];
}
