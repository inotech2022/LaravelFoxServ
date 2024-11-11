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
    public $timestamps = false; 


    protected $fillable = [
        'serviceId',
        'serviceName',
        'serviceTypeId'
    ];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'serviceTypeId', 'serviceTypeId');
    }

    public function professionals()
    {
        return $this->belongsToMany(Professional::class, 'service_professionals', 'serviceId', 'professionalId');
    }
}
