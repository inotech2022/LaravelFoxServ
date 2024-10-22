<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $table = 'serviceTypes';

    protected $fillable = [
        'serviceTypeId',
        'serviceTypeName',
        'lightPic',
        'darkPic'
    ];
    public function service()
    {
        return $this->hasOne(Service::class);
    }
}

class service_professional extends Model
{
    protected $fillable = ['professionalId', 'serviceId', 'typeServiceId'];
}
