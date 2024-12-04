<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UsuarioRegistrado extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('¡Registro exitoso!')
            ->greeting('Hola ' . $notifiable->nombre . '!')
            ->line('Gracias por registrarte en Turista Sin Maps.')
            ->line('Confirma tu cuenta para acceder a todas nuestras funcionalidades.')
            ->action('Confirmar cuenta', url('/'))
            ->line('¡Esperamos que disfrutes tu experiencia con nosotros!');
    }
}

