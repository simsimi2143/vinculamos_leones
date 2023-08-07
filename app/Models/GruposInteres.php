<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposInteres extends Model
{
    use HasFactory;

    protected $table = 'grupos_interes';

    public $timestamps = false;

    protected $primaryKey ='grin_codigo';

    protected $fillable = [
        'grin_codigo',
        'grin_nombre',
        'grin_visible',
        'grin_creado',
        'grin_actualizado',
        'grin_nickname_mod',
        'grin_rol_mod'
    ];
}
