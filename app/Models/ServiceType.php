<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $table = 'serviceTypes';
    protected $primaryKey = 'serviceTypeId';

    public $incrementing = true; 

    protected $keyType = 'int';

    protected $fillable = [
        'serviceTypeId',
        'serviceTypeName',
        'lightPic',
        'darkPic'
    ];
    
    public function services()
    {
        return $this->hasMany(Service::class, 'serviceTypeId', 'serviceTypeId');
    }
}

class service_professional extends Model
{
    protected $fillable = ['professionalId', 'serviceId', 'typeServiceId'];
}
