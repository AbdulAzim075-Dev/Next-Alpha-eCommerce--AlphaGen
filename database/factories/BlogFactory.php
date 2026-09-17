<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::role('root')->first();
        $category = $this->faker->randomElement(Category::all());
        $title = $this->faker->sentence;

        return [
            'user_id' => $user->id,
            'title' => $title,
            'title_secondary' => 'অনলাইন শপিং সম্পর্কে পরীক্ষামূলক নিবন্ধ',
            'slug' => Str::slug($title),
            'media_id' => Media::factory()->create(),
            'category_id' => $category->id,
            'description' => $this->faker->paragraphs(rand(5, 10), true),
            'description_secondary' => 'এটি একটি পরীক্ষামূলক বাংলা নিবন্ধের বিষয়বস্তু যা স্টোরের মধ্যে বহুভাষিক ব্লগ প্রদর্শন পরীক্ষায় সহায়তা করে।',
            'is_active' => $this->faker->boolean(),
        ];
    }
}
