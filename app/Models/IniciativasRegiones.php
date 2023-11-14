<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasRegiones extends Model
{
    use HasFactory;

    protected $table = 'iniciativas_regiones';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'regi_codigo',
        'rein_creado',
        'rein_actualizado',
        'rein_nickname_mod',
        'rein_rol_mod'

    ];
}
