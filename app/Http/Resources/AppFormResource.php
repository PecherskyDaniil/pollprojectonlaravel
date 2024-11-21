<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppFormResource extends JsonResource
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
            'favorite_food' => $this->favorite_food,
            'favorite_animal' => $this->favorite_animal,
            'secret' => $this->secret,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
