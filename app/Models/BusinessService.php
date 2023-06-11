<?php

namespace App\Models;

use App\Support\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class BusinessService extends Model
{
    use HasFactory;

    protected $table = 'business_services';

    protected $fillable = [
        'business_id',
        'title',
        'price',
        'currency_id',
        'description',
        'duration',
        'is_field',
		'user_id',
    ];

	protected $casts = [
		'price' => PriceCast::class,
		'is_field' => 'boolean',
	];

	protected $with = [
		'currency',
	];

	protected $perPage = 100;

    public function businessProfile(): BelongsTo
    {
        return $this->belongsTo(BusinessProfile::class, 'business_id');
    }

	public function questions(): HasMany
	{
		return $this->hasMany(BusinessServicesQuestion::class);
	}

	public function feedbacks(): HasMany
	{
		return $this->hasMany(BusinessServicesFeedback::class);
	}

	public function currency(): BelongsTo
	{
		return $this->belongsTo(Currency::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
