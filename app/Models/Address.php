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

    public function rulesAddress()
    {
        return [
            'cep' => 'required|max:8',
            'street' => 'required',
            'number' => 'required', 
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ];
    }

    public function feedbackAddress()
    {
        return [
            'require' => 'O campo :attribute é obrigatório',
            'max' => 'O CEP deve ter no máximo 8 caracteres'  
        ]; 
    }

}
