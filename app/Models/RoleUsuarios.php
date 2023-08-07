<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUsuarios extends Model
{
    use HasFactory;

    protected $table = 'role_usuarios';

    public $timestamps = false;

    protected $fillable = [
        'rous_codigo',
        'rous_nombre',
        'rous_creado',
        'rous_actualizado',
        'rous_visible',
        'rous_nickname_mod',
        'rous_rol_mod'
    ];
}
