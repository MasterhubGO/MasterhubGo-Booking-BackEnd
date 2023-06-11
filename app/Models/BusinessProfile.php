<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    use HasFactory;

    protected $table = 'business_profiles';
    protected $fillable = [
        'user_id',
        'role_id',
        'photo',
        'banner',
        'phone',
        'personal_site',
        'address',
        'email',
        'profile_description',
        'social_links',
        'verified',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function businessRole()
    {
        return $this->belongsTo(BusinessRole::class, 'role_id');
    }


    public function master()
    {
        return $this->hasOne(Master::class, 'business_profile_id');
    }

    public function salon()
    {
        return $this->hasOne(Salon::class, 'business_profile_id');
    }
}
