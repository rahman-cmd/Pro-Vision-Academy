<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = 'New Contact Message: ' . ($this->data['subject'] ?? 'No subject');

        return $this
            ->subject($subject)
            ->replyTo($this->data['email'], $this->data['name'] ?? null)
            ->view('emails.contact_message')
            ->with(['data' => $this->data]);
    }
}