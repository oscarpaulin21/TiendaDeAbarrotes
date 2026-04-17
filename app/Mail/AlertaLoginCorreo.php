<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertaLoginCorreo extends Mailable
{
    use SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alerta de Inicio de Sesión',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.alerta_login',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}