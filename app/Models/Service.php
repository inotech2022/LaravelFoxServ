<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'serviceId',
        'serviceName',
        'serviceTypeId'
    ];

    // Relacionamento com ServiceType
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    // Relacionamento muitos-para-muitos com Professional
    public function professionals()
    {
        return $this->belongsToMany(Professional::class, 'service_professional', 'serviceId', 'professionalId');
    }
}
