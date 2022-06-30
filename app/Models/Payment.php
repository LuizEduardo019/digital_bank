<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =
    [
        'payer_account',
        'receiver_account',
        'ticket_value',
        'password_payment',
        'was_paid'
    ];


    public function account()
    {
        return $this->belongsTo(account::class);
    }
}
