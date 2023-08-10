<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuelas extends Model
{
    use HasFactory;

    protected $table = 'escuelas';

    public $timestamps = false;

    protected $primaryKey = 'escu_codigo';

    protected $fillable = [
        'escu_codigo',
        'escu_nombre',
        'escu_descripcion',
        'escu_director',
        'escu_visible',
        'escu_institucion',
        'escu_creado',
        'escu_actualizado',
        'escu_nickname_mod',
        'escu_rol_mod'
    ];
}
