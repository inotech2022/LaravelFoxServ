<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'serviceId';

    public $incrementing = true; 

    protected $keyType = 'int';
    protected $fillable = [
        'serviceId',
        'serviceName',
        'serviceTypeId'
    ];

    // Relacionamento com ServiceType
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'serviceTypeId', 'serviceTypeId');
    }

    // Relacionamento muitos-para-muitos com Professional (um serviço pode ser prestado por muitos profissionais)
    public function professionals()
    {
        return $this->belongsToMany(Professional::class, 'service_professional', 'serviceId', 'professionalId');
    }
}
