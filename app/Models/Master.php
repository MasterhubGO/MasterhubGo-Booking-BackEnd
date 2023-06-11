<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Master extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_profile_id',
        'first_name',
        'last_name',
        'personal_website',
        'diploma_photos',
        'specialization',
        'education',
        'workplace',
        'work_start_date',
        'work_end_date',
        'position',
        'services',
    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }

    public function businessServices(): MorphOne
    {
        return $this->morphOne(BusinessService::class, 'serviceable');
    }
}
