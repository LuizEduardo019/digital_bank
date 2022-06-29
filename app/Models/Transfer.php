<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable =
    [
    'value',
    'to_account',
    'of_account',
    'description',
    'password_transfer'
    ];

    protected $dates = ['date'];


    public function account(){
        return $this->belongsTo(account::class);
    }
}
