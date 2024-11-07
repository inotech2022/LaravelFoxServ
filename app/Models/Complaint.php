<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaintId',
        'reason',
        'complaintDate',
        'otherReason',
        'userId',
        'professionalId'
    ];

    protected $primaryKey = 'complaintId';
 
    public $incrementing = true;

    public $timestamps = false;
}
