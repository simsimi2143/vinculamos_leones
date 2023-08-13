<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramasActividades;

class Programas extends Model
{
    use HasFactory;

    protected $table = 'programas';

    public $timestamps = false;

    protected $primaryKey = 'prog_codigo';

    protected $fillable = [
        'prog_codigo',
        'prog_ano',
        'amac_codigo',
        'prog_nombre',
        'prog_descripcion',
        'prog_director',
        'prog_meta_socios',
        'prog_meta_iniciativas',
        'prog_meta_estudiantes',
        'prog_meta_docentes',
        'prog_meta_beneficiarios',
        'prog_meta_asignaturas',
        'prog_meta_n_carreras',
        'prog_meta_n_asignaturas',
        'prog_visible',
        'prog_creado',
        'prog_actualizado',
        'prog_nickname_mod',
        'prog_rol_mod'
    ];

    public function actividades()
    {
        return $this->hasMany(ProgramasActividades::class, 'prog_codigo');
    }
}
