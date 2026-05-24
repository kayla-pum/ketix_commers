<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $tickets;

    public function __construct(Order $order, $tickets)
    {
        $this->order = $order;
        $this->tickets = $tickets;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice & E-Tiket: ' . $this->order->event->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
