<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteRating extends Model
{
    use HasFactory;
    
    public $timestamps = false; 
    protected $table = 'websiteRatings';

    protected $fillable = [
        'websiteRatingId',
        'starAmount',
        'comment',
        'ratingDate',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
