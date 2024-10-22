<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false;
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'userId';
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'phone',
        'cpf',
        'birthDate',
        'profilePic',
        'email',
        'password',
        'type',
        'token',
        'status'
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



    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
