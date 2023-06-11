<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Salon extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_profile_id',
        'salon_name',
        'diploma_photos',
        'services',
        'subscriptions',
        'followers',
        'reviews',
        'rating',
        'publications',
        'promotions',
        'personal_info',
        'portfolio_count',
        'courses',
        'employees',
        'notifications',
    ];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }

    public function businessServices(): MorphMany
    {
        return $this->morphMany(BusinessService::class, 'serviceable');
    }
}
