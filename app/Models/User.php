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

    public function rulesUsers ()
    {
        return [
            'users' => [
                'name' => 'required',
                'birth_date' => 'required',
                'email' => 'required|unique:users',
                'telephone' => 'required',
                'gender' => 'required',
                'document_type' => 'required',
                'document_number' => 'required|unique:users',
                'password' => 'required'
            ]
        ];
    }
}
