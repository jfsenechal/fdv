<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PhotoResource extends JsonResource
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
            'path' => $this->path,
            'url' => $this->url,
            'season' => $this->season?->value,
            'season_label' => $this->season?->getLabel(),
            'caption' => $this->caption,
            'credit' => $this->credit,
            'sort' => $this->sort,
            'has_cover' => $this->has_cover,
            'category_photo_id' => $this->category_photo_id,
        ];
    }
}