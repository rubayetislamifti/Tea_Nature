<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $deliveryDate;

    public function __construct($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    public function build()
    {
        return $this->view('email.orders-shipped')
            ->with([
                'deliveryDate' => $this->deliveryDate,
            ]);
    }
}
