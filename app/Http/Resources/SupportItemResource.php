<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = $request->header('accept-language') ?? 'en';

        return [
            'id' => $this->id,
            'icon' => $this->icon_url,
            'title' => is_secondary_lang($lang) && $this->secondary_title ? $this->secondary_title : $this->title,
            'description' => is_secondary_lang($lang) && $this->secondary_description ? $this->secondary_description : $this->description,
        ];
    }
}
