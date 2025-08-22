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
