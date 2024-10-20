<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TiketDikirim extends Notification
{
    use Queueable;

    protected $purchase;

    public function __construct($purchase)
    {
        $this->purchase = $purchase;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Tiket Konser Anda')
                    ->greeting('Halo, ' . $this->purchase->tiket_nama)
                    ->line('Tiket Anda untuk event ' . $this->purchase->event->event_name . ' telah dikirim.')
                    ->line('Kode Tiket: ' . $this->purchase->purchase_code)
                    ->line('Total Harga: Rp ' . number_format($this->purchase->total_price, 0, ',', '.'))
                    ->line('Terima kasih telah melakukan pembelian tiket!');
    }
}

