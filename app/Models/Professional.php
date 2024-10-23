<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'professionalId';
    protected $keyType = 'string';

    protected $fillable = [
        'professionalId',
        'description',
        'userId',
    ];

    // Relacionamento muitos-para-muitos com a tabela Service
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_professional', 'professionalId', 'serviceId');
    }
}