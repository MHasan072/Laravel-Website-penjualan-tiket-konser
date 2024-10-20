<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class TicketPurchase extends Model
{
    protected $table = 'ticket_purchases'; // Nama tabel di database
    protected $primaryKey = 'id_purchases'; // Primary key custom
    protected $fillable = ['id_user', 'id_event', 'purchase_code','tiket_nama','tiket_email','tiket_nohp','tiket_nik', 'total_price', 'payment_status', 'payment_proof'];

    // Relasi dengan pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi dengan event
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id_event');
    }
}