<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LaboratorieEmployee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'social_score',
        'mental_health_score',
        'psychological_health_score',
        'physical_health_score',
        'description',
    ];

    
    /**
     * Get the laboratorie employee's profile image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
