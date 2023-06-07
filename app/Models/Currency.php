<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Implements country currency codes according to ISO 4217 standard
 */
class Currency extends Model
{
    use HasFactory;

	public $timestamps = false;

	protected $fillable = [
		'alpha_code',
		'numeric_code',
		'fraction',
		'sign',
	];
}
