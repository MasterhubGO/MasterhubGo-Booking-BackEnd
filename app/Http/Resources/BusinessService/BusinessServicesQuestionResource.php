<?php

namespace App\Http\Resources\BusinessService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessServicesQuestionResource extends JsonResource
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
			'service_id' => $this->service_id,
			'question' => $this->question,
			'answer' => $this->answer,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
		];
    }
}
