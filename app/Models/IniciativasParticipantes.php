<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IniciativasParticipantes extends Model
{
    use HasFactory;
    protected $table = 'iniciativas_participantes';

    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'sugr_codigo',
        'soco_codigo',
        'inpr_total',
        'inpr_creado',
        'inpr_actualizado',
        'inpr_nickname_mod',
        'inpr_rol_mod'

    ];
}
