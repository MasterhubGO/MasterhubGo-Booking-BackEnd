<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResourceCollectionTrait
{
	public function toArray(Request $request): array
    {
        return [
			'count' => $this->count(),
			'items' => $this->collection,
		];
    }

	public function paginationInformation($request, $paginated, $default)
	{
		return [
			'total' => $default['meta']['total'],
		];
	}
}
