<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $usuario;

    public function __construct($usuario)
    {
        $this->usuario = $usuario;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = route('custom.verification.verify', [
            'id' => $this->usuario->idusuario,
            'hash' => sha1($this->usuario->getEmailForVerification()),
        ]);

        return (new MailMessage)
            ->subject('Verificación de Correo Electrónico')
            ->greeting('¡Hola!')
            ->line('Gracias por registrarte. Por favor, verifica tu correo electrónico haciendo clic en el siguiente enlace:')
            ->action('Verificar mi cuenta', $url)
            ->line('Si no has solicitado esta cuenta, ignora este mensaje.');
    }
}
