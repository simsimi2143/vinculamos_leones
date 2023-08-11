<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasActividades extends Model
{
    use HasFactory;

    protected $table = 'programas_actividades';
    protected $primaryKey = 'id_prog';

    public $timestamps = false;

    protected $fillable = [
        'prog_codigo',
        'tiac_codigo',
        'prog_creado',
        'prog_actualizado',
        'prog_nickname_mod',
        'prog_rol_mod'

    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'prog_codigo');
    }
    
    public function tipoActividad()
    {
        return $this->belongsTo(TipoActividad::class, 'tiac_codigo');
    }
}
