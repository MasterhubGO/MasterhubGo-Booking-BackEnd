<?php

namespace App\Http\Resources\BusinessService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessServiceCollection extends ResourceCollection
{
	public function toArray(Request $request): array
    {
        return [
			'count' => $this->count(),
			'items' => $this->collection,
		];
    }
}
