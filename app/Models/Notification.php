<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'reader_status',
    ];

    protected $casts = [
        'reader_status' => 'boolean',
    ];


    public function scopeCountNotification($query,$user_id)
    {
        $query->where('user_id',$user_id)->where('reader_status',0);
    }

}



