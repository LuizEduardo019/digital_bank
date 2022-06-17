<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $fillable = ['value', 'to_accont_id', 'of_accont_id'];
    
    
    public function account(){
        return $this->belongsTo(account::class);
    }
}
