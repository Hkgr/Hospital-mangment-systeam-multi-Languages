<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

   //Get the parent imageable model (user or post).
   protected $fillable = ['filename'];
    public function imageable()
    {
        return $this->morphTo();
    }
}
