<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class extracts extends Model
{
    protected $fillable = 
    [
    'account_id', 
    'payments_id', 
    'transfers_id'
    ];
   
    public function account(){
        return $this->belongsTo(account::class);
    }
}
