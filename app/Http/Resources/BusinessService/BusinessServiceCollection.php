<?php

namespace App\Http\Resources\BusinessService;

use App\Traits\ResourceCollectionTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessServiceCollection extends ResourceCollection
{
	use ResourceCollectionTrait;

	public static $wrap = 'items';
}
