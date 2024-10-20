<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\TicketPurchase;
use Mpdf\Mpdf;

class TicketPurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $purchase; // Variabel untuk menyimpan data pembelian

    public function __construct(TicketPurchase $purchase)
    {
        $this->purchase = $purchase; // Assign data pembelian ke variabel
    }

    public function build()
    {
        $mpdf = new Mpdf();
        $html = view('admin.emails.e-ticket', ['purchase' => $this->purchase])->render();
        $mpdf->WriteHTML($html);
        $pdfOutput = $mpdf->Output('', 'S');

        return $this->subject('Your Event Ticket')
            ->view('admin.emails.ticket_purchased')
            ->attachData($pdfOutput, 'Concertly-ticket_' . $this->purchase->purchase_code . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

}

