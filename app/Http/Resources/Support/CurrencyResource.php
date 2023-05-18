<?php

namespace App\Http\Resources\Support;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
			'alpha_code' => $this->alpha_code,
			'numeric_code' => $this->numeric_code,
			'fraction' => $this->fraction,
			'sign' => $this->sign,
		];
    }
}
