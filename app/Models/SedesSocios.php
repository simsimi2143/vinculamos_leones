<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedesSocios extends Model
{
    use HasFactory;
    protected $table = 'sedes_socios';

    public $timestamps = false;

    protected $fillable = [
        'soco_codigo',
        'sede_codigo',
        'seso_creado',
        'seso_nickname_mod',
        'seso_rol_mod',
    ];
}
