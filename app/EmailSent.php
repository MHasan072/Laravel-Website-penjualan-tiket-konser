<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSent extends Model
{
    protected $table = 'emails_sent'; // Nama tabel di database
    protected $primaryKey = 'id_email'; // Primary key custom
    protected $fillable = ['id_purchase', 'email_type', 'email_content', 'sent_at'];

    // Relasi dengan pembelian tiket
    public function ticketPurchase()
    {
        return $this->belongsTo(TicketPurchase::class, 'id_purchase', 'id_purchases');
    }
}