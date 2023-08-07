<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasGrupos extends Model
{
    use HasFactory;

    protected $table = 'iniciativas_grupos';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'grup_codigo',
        'ingr_creado',
        'ingr_actualizado',
        'ingr_nickname_mod',
        'ingr_rol_mod'

    ];
}
