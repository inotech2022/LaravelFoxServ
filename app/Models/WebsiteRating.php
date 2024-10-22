<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'websiteRatingId',
        'starAmount',
        'comment',
        'ratingDate',
        'userId'
    ];
}
