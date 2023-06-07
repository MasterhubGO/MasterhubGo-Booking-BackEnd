<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessServicesFeedback extends Model
{
    use HasFactory;

	protected $fillable = [
		'service_id',
		'user_id',
		'text',
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(BusinessService::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
