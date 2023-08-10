<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociosComunitarios extends Model
{
    use HasFactory;

    protected $table = 'socios_comunitarios';

    public $timestamps = false;

    protected $fillable = [
        'soco_codigo',
        'sugr_codigo',
        'soco_nombre_socio',
        'soco_nombre_contraparte',
        'soco_domicilio_socio',
        'soco_telefono_contraparte',
        'soco_email_contraparte',
    ];
}
