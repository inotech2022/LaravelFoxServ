<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_contracts extends Model
{
    use HasFactory;

    protected $table = 'vw_contracts';

    protected $dates = ['startDate', 'endDate'];

    public $incrementing = true; 
    protected $primaryKey = 'protocol';

    public $timestamps = false;
}
