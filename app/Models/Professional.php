<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

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
