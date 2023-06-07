<?php

namespace App\Http\Resources\BusinessService;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessServiceResource extends JsonResource
{
	public static $wrap = 'item';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
			'id' => $this->id,
			'business_id' => $this->business_id,
			'title' => $this->title,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'price' => $this->price,
			'user_id' => $this->user_id,
			'description' => $this->description,
			'duration' => $this->duration,
			'is_field' => $this->is_field
		];
    }
}
