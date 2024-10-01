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
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
