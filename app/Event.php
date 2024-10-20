<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events'; 
    protected $primaryKey = 'id_event'; 
    protected $fillable = ['event_name', 'event_date', 'venue', 'price', 'description'];

    // Relasi dengan pembelian tiket
    public function ticketPurchases()
    {
        return $this->hasMany(TicketPurchase::class, 'id_event', 'id_event');
    }
}