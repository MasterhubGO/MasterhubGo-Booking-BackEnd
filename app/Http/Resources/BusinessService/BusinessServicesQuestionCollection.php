<?php

namespace App\Http\Resources\BusinessService;

use App\Traits\ResourceCollectionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BusinessServicesQuestionCollection extends ResourceCollection
{
	use ResourceCollectionTrait;

	public static $wrap = 'items';
}
