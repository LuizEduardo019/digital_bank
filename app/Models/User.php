<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthdate',
        'email',
        'telephone',
        'gender',
        'document_type',
        'document_number',
        'password'     
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function rulesUser()
    {
        return [
            'name' => 'required',
            'birth_date' => 'required',
            'email' => 'email|unique:users',
            'telephone' => 'required',
            'gender' => 'required',
            'document_type' => 'required',
            'document_number' => 'required|unique:users|max:11',
            'password' => 'required'
         ];
    }

    public function feedbackUser()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O e-mail informado não é válido',
            'email.unique' => 'E-mail já cadastrado',
            'document_number.unique' => 'O número do documento já está cadastrado',
            'document_number.max' => 'O número do documento pode ter no máximo 11 caracteres'
        ];
    } 
}
