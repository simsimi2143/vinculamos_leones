<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class Usuarios extends Model implements CanResetPassword
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'usua_nickname',
        'rous_codigo',
        'usua_email',
        'usua_email_alternativo',
        'usua_clave',
        'usua_nombre',
        'usua_apellido',
        'usua_creado',
        'usua_actualizado',
        'usua_vigente',
        'usua_usuario_mod'
    ];

    public function getAuthPassword()
    {
        return $this->usua_clave;
    }

    public function getEmailForPasswordReset()
    {
        return $this->usua_email;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
