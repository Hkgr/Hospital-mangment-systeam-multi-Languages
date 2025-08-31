<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;

class Doctor extends Authenticatable
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','appointments'];
    public $fillable= [
        'email',
        'email_verified_at',
        'password',
        'phone',
        'name',
        'section_id',
        'status',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'social_score',
        'mental_health_score',
        'psychological_health_score',
        'physical_health_score',
        'description',
    ];        //protected $guarded=[];

    /**
     * Get the Doctor's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // One To One get section of Doctor
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }


    protected static function booted()
    {
        static::created(function (Doctor $doctor) {
            // Attach default image record if none exists
            if (!$doctor->image()->exists()) {
                $doctor->image()->create([
                    'filename' => 'default.png',
                ]);
            }

            // Ensure a default.png exists under doctors folder for views expecting foldered path
            try {
                $defaultPath = public_path('Dashboard/img/default.png');
                $targetDir = public_path('Dashboard/img/doctors');
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

    // Convenience accessor for avatar path in views
    public function getAvatarPathAttribute(): string
    {
        $filename = $this->image->filename ?? null;
        if ($filename && $filename !== 'default.png') {
            return asset('Dashboard/img/doctors/' . $filename);
        }
        return asset('Dashboard/img/default.png');
    }


}
