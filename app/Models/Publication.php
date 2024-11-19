<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'publicationId';
    protected $keyType = 'string';

    protected $fillable = [
        'publicationId',
        'date',
        'image',
        'caption',
        'professionalId'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_publication', 'publicationId', 'userId');
    }
 
}
