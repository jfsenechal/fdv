<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PlantResource extends JsonResource
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
            'latin_name' => $this->latin_name,
            'french_name' => $this->french_name,
            'english_name' => $this->english_name,
            'description' => $this->description,
            'conservation_status' => $this->conservation_status,
            'usages' => $this->usages,
            'ecological_role' => $this->ecological_role,
            'habitat' => $this->habitat,
            'flowering_period' => $this->flowering_period,
            'fruiting_period' => $this->fruiting_period,
            'etymology' => $this->etymology,
            'family' => [
                'id' => $this->family?->id,
                'name' => $this->family?->name,
            ],
            'genus' => [
                'id' => $this->genus?->id,
                'name' => $this->genus?->name,
            ],
            'type' => [
                'id' => $this->type?->id,
                'name' => $this->type?->name,
            ],
            'photos' => PhotoResource::collection($this->whenLoaded('photos')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}