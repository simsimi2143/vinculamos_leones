<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    public $timestamps = false;

    protected $primaryKey ='grup_codigo';

    protected $fillable = [
        'grup_codigo',
        'grup_nombre',
        'grup_visible',
        'grup_creado',
        'grup_actualizado',
        'grup_nickname_mod',
        'grup_rol_mod'
    ];
}
