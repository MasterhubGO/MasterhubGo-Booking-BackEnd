<?php

namespace App\Http\Resources\Cabinets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
			'count' => $this->count(),
			'items' => $this->collection,
		];
    }
}
