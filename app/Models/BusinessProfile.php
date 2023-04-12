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
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function businessRole()
    {
        return $this->belongsTo(BusinessRole::class);
    }

    public function businessServices()
    {
        return $this->hasMany(BusinessService::class);
    }
}
