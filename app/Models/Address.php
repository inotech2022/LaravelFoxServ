<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'addressId';

    public $incrementing = true;

    protected $keyType = 'int';
    protected $fillable = [
        'userId',
        'zipCode',
        'uf',
        'city',
        'district',
        'street',
        'number',
    ];
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
