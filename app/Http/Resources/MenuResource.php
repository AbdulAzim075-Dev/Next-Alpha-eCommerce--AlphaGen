<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = request()->header('accept-language') ?? 'en';

        return [
            'id' => $this->id,
            'name' => is_secondary_lang($lang) ? $this->secondary_name : $this->name,
            'title' => $this->title,
            'url' => $this->url,
            'target' => $this->target,
            'is_external' => (bool) $this->is_external,
        ];
    }
}
