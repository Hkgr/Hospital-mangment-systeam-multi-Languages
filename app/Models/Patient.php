<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class Patient extends Authenticatable
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','Address'];
    public $fillable= [
        'email',
        'Password',
        'Date_Birth',
        'Phone',
        'Gender',
        'Blood_Group',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'social_score',
        'mental_health_score',
        'psychological_health_score',
        'physical_health_score',
        'description',
    ];    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'Service_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Convenience accessor for displaying an avatar path in views
    public function getAvatarPathAttribute(): string
    {
        $filename = $this->image->filename ?? null;
        if ($filename && $filename !== 'default.png') {
            return asset('Dashboard/img/patients/' . $filename);
        }
        return asset('Dashboard/img/default.png');
    }

    protected static function booted()
    {
        static::created(function (Patient $patient) {
            if (!$patient->image()->exists()) {
                $patient->image()->create([
                    'filename' => 'default.png',
                ]);
            }

            // Ensure a default.png exists in patients folder for views that assume foldered path
            try {
                $defaultPath = public_path('Dashboard/img/default.png');
                $targetDir = public_path('Dashboard/img/patients');
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
                // swallow any filesystem errors silently
            }
        });
    }
}
