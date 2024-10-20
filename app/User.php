<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\TicketPurchase; // Import model TicketPurchase jika model ada di folder App

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user'; // Primary key custom

    protected $fillable = ['name', 'email','no_hp', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // Relasi dengan pembelian tiket
    public function ticketPurchases()
    {
        return $this->hasMany(TicketPurchase::class, 'id_user', 'id_user');
    }
}
