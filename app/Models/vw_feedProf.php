<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vw_feedProf extends Model
{
    protected $table = 'vw_feedProf';  // Nome da view no banco de dados
    public $timestamps = false;  // A view pode não ter timestamps
    protected $primaryKey = null;


    public static function getServicosPorProfissional($professionalId)
    {
        return self::where('professionalId', $professionalId)
                   ->get(['serviceName']);
    }
    public static function getCategoriaPorProfissional($professionalId)
    {
        return self::where('professionalId', $professionalId)
                   ->get(['serviceTypeName']);
    }
}
