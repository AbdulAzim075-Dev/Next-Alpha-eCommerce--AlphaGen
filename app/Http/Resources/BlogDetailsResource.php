<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $daysSinceCreated = $this->created_at->diffInDays(now());

        $isSecondary = is_secondary_lang(request()->header('accept-language') ?? 'en');

        return [
            'id' => $this->id,
            'title' => ($isSecondary && !empty($this->title_secondary)) ? $this->title_secondary : $this->title,
            'slug' => $this->slug,
            'category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
            ],
            'post_by' => [
                'name' => $this->user?->fullName ?? 'Admin',
                'profile_photo' => $this->user?->thumbnail ?? asset('default/default.jpg'),
            ],
            'thumbnail' => $this->thumbnail,
            'total_views' => $this->views->count(),
            'description' => ($isSecondary && !empty($this->description_secondary)) ? $this->description_secondary : $this->description,
            'created_at' => $this->created_at->format('d M, Y'),
            'is_new' => $daysSinceCreated < 5 ? true : false,
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
