<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasTematicas extends Model
{
    use HasFactory;
    protected $table = 'iniciativas_tematicas';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'tema_codigo',
        'inte_creado',
        'inte_actualizado',
        'inte_nickname_mod',
        'inte_rol_mod'

    ];
}
