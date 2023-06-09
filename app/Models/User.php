<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ProfileVisit;
use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'user_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses(): HasMany
    {
        return $this->hasMany(BusinessProfile::class);
    }

    public function visitedProfiles(): HasMany
    {
        return $this->hasMany(ProfileVisit::class, 'visitor_id');
    }


    public function profileVisitors(): HasMany
    {
        return $this->hasMany(ProfileVisit::class, 'visited_id');
    }

    public function Publications(): HasMany
    {
       return $this->hasMany(Publication::class);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(BusinessServicesFeedback::class);
    }
}
