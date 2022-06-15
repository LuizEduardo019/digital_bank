<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'bank_number'
    ];
    

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

}


