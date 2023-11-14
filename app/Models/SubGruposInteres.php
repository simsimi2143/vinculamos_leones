<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGruposInteres extends Model
{
    use HasFactory;

    protected $table = 'sub_grupos_interes';

    public $timestamps = false;

    protected $primaryKey ='sugr_codigo';

    protected $fillable = [
        'sugr_codigo',
        'grin_codigo',
        'sugr_nombre',
        'sugr_visible',
        'sugr_creado',
        'sugr_actualizado',
        'sugr_nickname_mod',
        'sugr_rol_mod'
    ];
}
