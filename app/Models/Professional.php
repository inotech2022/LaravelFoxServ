<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'professionalId'; 
    public $incrementing = true; 
    protected $keyType = 'int';

        protected $fillable = [
            'professionalId',
            'description',
            'userId',
            ];
            
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_professionals', 'professionalId', 'serviceId');
    }
}