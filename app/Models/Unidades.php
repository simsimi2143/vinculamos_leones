<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $primaryKey = 'unid_codigo';

    public $timestamps = false;

    protected $fillable = [
        'unid_codigo',
        'tuni_codigo',
        'unid_nombre',
        'unid_descripcion',
        'unid_responsable',
        'unid_nombre_cargo',
        'unid_creado',
        'unid_actualizado',
        'unid_visible',
        'unid_nickname_mod',
        'unid_rol_mod',
    ];

    protected $attributes = [
        'unid_visible' => 1, // Valor predeterminado para unid_visible
    ];
}
