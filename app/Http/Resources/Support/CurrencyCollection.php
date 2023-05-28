<?php

namespace App\Http\Resources\Support;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CurrencyCollection extends ResourceCollection
{
	public function toArray(Request $request): array
    {
        return [
			'count' => $this->count(),
			'items' => $this->collection,
		];
    }
}
