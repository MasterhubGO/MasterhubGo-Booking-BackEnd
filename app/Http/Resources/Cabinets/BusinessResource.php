<?php

namespace App\Http\Resources\Cabinets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => $this->businessRole->role,
            'photo' => $this->photo,
            'banner' => $this->banner,
            'phone' => $this->phone,
            'personal_site' => $this->personal_site,
            'services' => ServicesResource::collection($this->businessServices)
        ];
    }
}
