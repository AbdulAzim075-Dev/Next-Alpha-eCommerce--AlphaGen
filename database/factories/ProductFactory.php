<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Media;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brands = Brand::all();

        return [
            'shop_id' => Shop::all()->random()->id,
            'media_id' => Media::factory()->create(),
            'brand_id' => $brands->random()->id,
            'unit_id' => 1,
            'name' => $this->faker->word,
            'name_secondary' => 'পরীক্ষামূলক পণ্য',
            'quantity' => $this->faker->numberBetween(1, 100),
            'short_description' => $this->faker->sentence,
            'short_description_secondary' => 'পণ্যটি স্পষ্ট ও দ্রুত প্রদর্শনের জন্য একটি সংক্ষিপ্ত বাংলা বিবরণ।',
            'description' => $this->faker->sentence,
            'description_secondary' => 'এটি একটি পরীক্ষামূলক বাংলা পণ্য বিবরণ যা গুরুত্বপূর্ণ বিবরণ ও সুবিধাগুলো সংক্ষেপে তুলে ধরে।',
            'discount_price' => $this->faker->randomFloat(2, 10, 100),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'is_active' => $this->faker->boolean(),
            'is_approve' => true,
        ];
    }
}
