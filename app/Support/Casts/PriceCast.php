<?php

namespace App\Support\Casts;

use App\Support\ValueObjects\Price;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PriceCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): Price
    {
		return new Price($value, $model->currency);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): int
    {
		if ($value instanceof Price) {
			return $value->amount;
		}

        return $value * $model->load('currency')->currency->fraction;
    }
}
