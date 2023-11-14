<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnidades extends Model
{
    use HasFactory;

    protected $table = 'sub_unidades';

    protected $primaryKey = 'suni_codigo';

    public $timestamps = false;

    protected $fillable = [
        'suni_codigo',
        'unid_codigo',
        'suni_nombre',
        'suni_responsable',
        'suni_descripcion',
        'suni_creado',
        'suni_actualizado',
        'suni_visible',
        'suni_nickname_mod',
        'suni_rol_mod',
    ];

    protected $attributes = [
        'suni_visible' => 1, // Valor predeterminado para suni_visible
    ];
}
