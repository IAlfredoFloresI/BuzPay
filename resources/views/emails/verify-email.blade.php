<p>¡Hola!</p>
<p>Gracias por registrarte. Por favor, verifica tu correo electrónico haciendo clic en el siguiente enlace:</p>
<a href="{{ route('custom.verification.verify', ['id' => $usuario->idusuario, 'hash' => sha1($usuario->getEmailForVerification())]) }}">Verificar mi cuenta</a>
<p>Si no has solicitado esta cuenta, ignora este mensaje.</p>
