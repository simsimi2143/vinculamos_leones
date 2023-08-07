<!DOCTYPE html>
<html>
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <table style="max-width: 600px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
        <tr>
            <td style="text-align: center; background-color: #042344; padding: 10px;">
                <h1 style="color: white;">Restablecer contraseña</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta.</p>
                <p>Puedes restablecer tu contraseña haciendo clic en el siguiente enlace:</p>
                <p style="text-align: center;">
                    <a style="display: inline-block; padding: 10px 20px; background-color: #042344; color: white; text-decoration: none; border-radius: 5px;" href="{{ route('reset.password.get', $token) }}">Restablecer contraseña</a>
                </p>
                <p>Si no solicitaste restablecer tu contraseña, puedes ignorar este correo.</p>
                <p>¡Gracias!</p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f2f2f2; text-align: center; padding: 10px;">
                <p style="font-size: 12px; color: #666;">Este es un correo automático, por favor no respondas.</p>
            </td>
        </tr>
    </table>
</body>
</html>
