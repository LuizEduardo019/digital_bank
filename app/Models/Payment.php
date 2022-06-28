<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =
    [
        'to_account_id',
        'of_account_id',
        'value',
        'to_accont_id',
        'of_accont_id'
    ];


    public function account(){
        return $this->belongsTo(account::class);
    }

}
