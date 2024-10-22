<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class Professional extends Model
{   
    public $timestamps = false;
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable;

    protected $primaryKey = 'professionalId';
    protected $keyType = 'string';

    protected $fillable = [
        'professionalId',
        'description',
        'userId',
        ];

        public function services()
    {
        return $this->hasMany(service_professional::class, 'professionalId');
    }
}
