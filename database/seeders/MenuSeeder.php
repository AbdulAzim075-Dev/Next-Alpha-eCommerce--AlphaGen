<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::truncate();

        $data = [
            [
                'name' => 'Home',
                'secondary_name' => 'হোম',
                'url' => '/',
                'title' => 'Home',
                'original_name' => 'Home',
                'original_url' => '/',
                'order' => 1,
                'is_active' => true,
                'is_default' => true,
            ],
            [
                'name' => 'Products',
                'secondary_name'=> 'পণ্যসমূহ',
                'url' => '/products',
                'title' => 'Products',
                'original_name' => 'Products',
                'original_url' => '/products',
                'order' => 2,
                'is_active' => true,
                'is_default' => true,
            ],
            // [
            //     'name' => 'Digital Products',
            //     'secondary_name'=> 'ডিজিটাল পণ্যসমূহ',
            //     'url' => '/digital-products',
            //     'title' => 'Digital Products',
            //     'original_name' => 'Digital Products',
            //     'original_url' => '/digital-products',
            //     'order' => 3,
            //     'is_active' => true,
            //     'is_default' => true,
            // ],
            [
                'name' => 'Shops',
                'secondary_name'=> 'দোকানসমূহ',
                'url' => '/shops',
                'title' => 'Shops',
                'original_name' => 'Shops',
                'original_url' => '/shops',
                'order' => 4,
                'is_active' => true,
                'is_default' => true,
            ],
            [
                'name' => 'Brands',
                'secondary_name'=> 'ব্র্যান্ড',
                'url' => '/brands',
                'title' => 'Brands',
                'original_name' => 'Brands',
                'original_url' => '/brands',
                'order' => 5,
                'is_active' => true,
                'is_default' => true,
            ],
            // [
            //     'name' => 'Best Deal',
            //     'secondary_name'=> 'সেরা অফার',
            //     'url' => '/best-deal',
            //     'title' => 'Best Deal',
            //     'original_name' => 'Best Deal',
            //     'original_url' => '/best-deal',
            //     'order' => 6,
            //     'is_active' => true,
            //     'is_default' => true,
            // ],
            [
                'name' => 'Contact',
                'secondary_name'=> 'যোগাযোগ',
                'url' => '/contact-us',
                'title' => 'Contact',
                'original_name' => 'Contact',
                'original_url' => '/contact-us',
                'order' => 7,
                'is_active' => true,
                'is_default' => true,
            ],
            [
                'name' => 'Blogs',
                'secondary_name'=> 'ব্লগ',
                'url' => '/blogs',
                'title' => 'Blogs',
                'original_name' => 'Blogs',
                'original_url' => '/blogs',
                'order' => 8,
                'is_active' => true,
                'is_default' => true,
            ],
        ];
        foreach ($data as $item) {
            $exists = Menu::where('name', $item['name'])->first();
            if (!$exists) {
                Menu::create($item);
            }
        }
    }
}
