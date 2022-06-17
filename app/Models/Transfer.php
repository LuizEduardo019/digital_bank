<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfers extends Model
{
    protected $fillable = ['value', 'date', 'to_accont_id', 'of_accont_id'];

    protected $dates = ['date'];


    public function account(){
        return $this->belongsTo(account::class);
    }
}
