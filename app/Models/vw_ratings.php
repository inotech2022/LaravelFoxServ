<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_ratings extends Model
{
    use HasFactory;

    protected $table = 'vw_rating';
    public $timestamps = false;
}
