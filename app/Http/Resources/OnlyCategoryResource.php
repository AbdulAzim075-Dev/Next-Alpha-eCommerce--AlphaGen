<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OnlyCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isSecondary = is_secondary_lang(request()->header('accept-language') ?? 'en');

        return [
            'id' => $this->id ?? null,
            'slug' => $this->slug ?? null,
            'name' => ($isSecondary && !empty($this->name_secondary)) ? $this->name_secondary : ($this->name ?? null),
            'thumbnail' => $this->thumbnail ?? null,
        ];
    }
}
