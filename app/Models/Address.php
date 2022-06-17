<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

protected $fillable = [
    'cep',
    'street',
    'number',
    'complement',
    'district',
    'city',
    'state'
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function rules()
{
    return [
        'address' => [
            'cep' => 'required',
            'street' => 'required',
            'number' => 'required', 
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]
    ];
}

}
