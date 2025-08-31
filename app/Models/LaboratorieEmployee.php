<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;

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

    protected static function booted()
    {
        static::created(function (LaboratorieEmployee $employee) {
            // Attach default image record if none exists
            if (!$employee->image()->exists()) {
                $employee->image()->create([
                    'filename' => 'default.png',
                ]);
            }

            // Ensure a default.png exists under laboratorie_employees folder for views expecting foldered path
            try {
                $defaultPath = public_path('Dashboard/img/default.png');
                $targetDir = public_path('Dashboard/img/laboratorie_employees');
                $targetPath = $targetDir . DIRECTORY_SEPARATOR . 'default.png';
                if (File::exists($defaultPath)) {
                    if (!File::exists($targetDir)) {
                        File::makeDirectory($targetDir, 0755, true);
                    }
                    if (!File::exists($targetPath)) {
                        File::copy($defaultPath, $targetPath);
                    }
                }
            } catch (\Throwable $e) {
                // ignore filesystem errors
            }
        });
    }

    public function getAvatarPathAttribute(): string
    {
        $filename = $this->image->filename ?? null;
        if ($filename && $filename !== 'default.png') {
            return asset('Dashboard/img/laboratorie_employees/' . $filename);
        }
        return asset('Dashboard/img/default.png');
    }
}
