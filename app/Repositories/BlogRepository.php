<?php

namespace App\Repositories;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class BlogRepository extends Repository
{
    public static function model()
    {
        return Blog::class;
    }

    public static function storeByRequest(BlogRequest $request): Blog
    {

        $description = ProductRepository::sanitizeUnicode($request->description);
        $description = mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8');
        $description = Purifier::clean($description);

        $title = ProductRepository::sanitizeUnicode($request->title);

        $descriptionSecondary = null;
        if ($request->filled('description_secondary')) {
            $descriptionSecondary = ProductRepository::sanitizeUnicode($request->description_secondary);
            $descriptionSecondary = mb_convert_encoding($descriptionSecondary, 'HTML-ENTITIES', 'UTF-8');
            $descriptionSecondary = Purifier::clean($descriptionSecondary);
        }

        $blog = self::create([
            'user_id' => auth()->id(),
            'title' => $title,
            'title_secondary' => $request->title_secondary,
            'category_id' => $request->category,
            'description' => $description,
            'description_secondary' => $descriptionSecondary,
            'blog_thumbnail' => $request->thumbnail,
        ]);

        foreach ($request->tags ?? [] as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);

            $blog->tags()->attach($tag->id);
        }

        return $blog;
    }

    public static function updateByRequest(BlogRequest $request, Blog $blog): Blog
    {

        $description = ProductRepository::sanitizeUnicode($request->description);
        $description = mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8');

        $title = ProductRepository::sanitizeUnicode($request->title);

        $descriptionSecondary = $blog->description_secondary;
        if ($request->filled('description_secondary')) {
            $descriptionSecondary = ProductRepository::sanitizeUnicode($request->description_secondary);
            $descriptionSecondary = mb_convert_encoding($descriptionSecondary, 'HTML-ENTITIES', 'UTF-8');
            $descriptionSecondary = Purifier::clean($descriptionSecondary);
        }

        $blog->update([
            'title' => $title,
            'title_secondary' => $request->title_secondary ?? $blog->title_secondary,
            'category_id' => $request->category,
            'description' => $description,
            'description_secondary' => $descriptionSecondary,
            'blog_thumbnail' => $request->thumbnail,
        ]);

        $blog->tags()->detach();

        foreach ($request->tags ?? [] as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);

            $blog->tags()->attach($tag->id);
        }

        return $blog;
    }

    private static function thumbnailUpdateOrCreate($media, $request)
    {
        $thumbnail = $media;
        if ($request->hasFile('thumbnail') && $media) {
            $thumbnail = MediaRepository::updateByRequest($request->thumbnail, 'blogs', 'image', $media);

            return $thumbnail;
        }

        if ($request->hasFile('thumbnail') && ! $media) {
            $thumbnail = MediaRepository::storeByRequest($request->thumbnail, 'blogs', 'image');
        }

        return $thumbnail;
    }
}
