<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantesInternos extends Model
{
    use HasFactory;
    protected $table = 'participantes_internos';

    protected $primaryKey = 'pain_codigo';
    public $timestamps = false;

    protected $fillable = [
        'inic_codigo',
        'sede_codigo',
        'escu_codigo',
        'pain_docentes',
        'pain_docentes_final',
        'pain_estudiantes',
        'pain_estudiantes_final',
        'pain_funcionarios',
        'pain_funcionarios_final',
        'pain_total',
    ];
}
