<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RayEmployee extends Authenticatable
{
    use HasFactory;
    protected $guarded=[];
      /**
     * Get the ray employee's profile image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
