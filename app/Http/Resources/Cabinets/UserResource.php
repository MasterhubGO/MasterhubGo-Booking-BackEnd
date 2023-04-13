<?php

namespace App\Http\Resources\Cabinets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'user_role' => $this->user_role,
            'email' => $this->email,
            'gender' => $this->gender,
            'business_profile' => BusinessResource::collection($this->businesses)
        ];
    }
}
