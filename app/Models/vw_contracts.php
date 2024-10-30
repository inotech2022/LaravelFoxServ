<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_contracts extends Model
{
    protected $table = 'vw_contracts';

    protected $dates = ['dataInicial', 'dataFinal'];
}
