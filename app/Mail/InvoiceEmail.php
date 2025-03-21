<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf;
    public $user_order;

    public function __construct($pdf, $cartItems)
    {
        $this->pdf = $pdf;
        $this->cartItems = $cartItems;
    }

    public function build()
    {
        return $this->view('invoice')
                    ->attachData($this->pdf->output(), 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
