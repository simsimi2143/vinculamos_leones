<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUnidades extends Model
{
    use HasFactory;

    protected $table = 'tipo_unidades';

    public $timestamps = false;

    protected $primaryKey ='tuni_codigo';

    protected $fillable = [
        'tuni_codigo',
        'tuni_nombre',
        'tuni_creado',
        'tuni_actualizado',
        'tuni_visible',
        'tuni_nickname_mod',
        'tuni_rol_mod',
    ];
}
