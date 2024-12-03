<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_likes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'lastName',
        'profilePic',
        'likeDate',
        'professionalId'
        ];
}
