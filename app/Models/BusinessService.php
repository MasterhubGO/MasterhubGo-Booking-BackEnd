<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessService extends Model
{
    use HasFactory;

    protected $table = 'business_services';
    protected $fillable = [
        'business_id',
        'title',
        'price',
        'currency',
        'description',
        'duration',
        'is_field',
    ];

	protected $casts = [];

    public function businessProfile()
    {
        return $this->belongsTo(BusinessProfile::class);
    }

	public function questions(): HasMany
	{
		return $this->hasMany(BusinessServicesQuestion::class);
	}

	public function feedbacks(): HasMany
	{
		return $this->hasMany(BusinessServicesFeedback::class);
	}
}
