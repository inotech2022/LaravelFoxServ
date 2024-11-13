<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'suggestionId',
        'suggestion',
        'userId',
        'suggestionDate'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
