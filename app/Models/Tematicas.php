<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tematicas extends Model
{
    use HasFactory;

    protected $table = 'tematicas';

    public $timestamps = false;

    protected $primaryKey ='tema_codigo';

    protected $fillable = [
        'tema_codigo',
        'tema_nombre',
        'tema_visible',
        'tema_creado',
        'tema_actualizado',
        'tema_nickname_mod',
        'tema_rol_mod'
    ];

    protected $attributes = [
        'tema_visible' => 1, // Establece el valor predeterminado para 'tema_visible' como 1
    ];
}
