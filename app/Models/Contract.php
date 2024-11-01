<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = [
        'protocol',
        'registrationDate',
        'startDate',
        'endDate',
        'price',
        'description',
        'userId',
        'professionalId',
        'serviceId'

    ];

     
     protected $primaryKey = 'protocol';
 
     public $incrementing = true;

     public $timestamps = false;

}
