<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacaoCadastro extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Confirme seu cadastro')
                    ->view('emails.confirmacao')
                    ->with([
                        'name' => $this->user->name,
                        'confirmationLink' => url('/confirmar-email/'.$this->user->token),
                    ]);
    }
}