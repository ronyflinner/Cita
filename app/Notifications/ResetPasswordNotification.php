<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification {
	/**
	 * The password reset token.
	 *
	 * @var string
	 */
	public $token;

	/**
	 * Create a notification instance.
	 *
	 * @param  string  $token
	 * @return void
	 */
	public function __construct($token) {
		$this->token = $token;
	}

	/**
	 * Get the notification's channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array|string
	 */
	public function via($notifiable) {
		return ['mail'];
	}

	/**
	 * Build the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable) {
		return (new MailMessage)
			->subject('Solicitud de Reestablecimiento de Contraseña')
			->greeting('Hola!', $notifiable->name)
			->line('Recibes esta linea porque se solicitud un cambio de contraseña.')
			->action('Reseteo de contraseña', url(config('app.url') . route('password.reset', $this->token, false)))
			->line('Si no realizaste esta petición, puedes ignorar el correo y nada habra cambiado. ')
			->salutation('¡Saludos, Gracias!');
	}
}
