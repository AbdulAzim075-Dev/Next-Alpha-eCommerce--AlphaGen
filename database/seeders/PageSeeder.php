<?php

namespace Database\Seeders;

use App\Models\Page;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::truncate();

        $faker = Factory::create();

        // Pages
        $pages = [
            [
                'title' => 'Products',
                'title_secondary' => 'পণ্যসমূহ',
                'slug' => 'products',
                'url' => 'products',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Shops',
                'title_secondary' => 'দোকানসমূহ',
                'slug' => 'shops',
                'url' => 'shops',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Most Popular',
                'title_secondary' => 'সর্বাধিক জনপ্রিয়',
                'slug' => 'most-popular',
                'url' => 'most-popular',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Digital Products',
                'title_secondary' => 'ডিজিটাল পণ্যসমূহ',
                'slug' => 'digital-products',
                'url' => 'digital-products',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Best Deal',
                'title_secondary' => 'সেরা ডিল',
                'slug' => 'best-deal',
                'url' => 'best-deal',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Contact',
                'title_secondary' => 'যোগাযোগ',
                'slug' => 'contact-us',
                'url' => 'contact-us',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'Blogs',
                'title_secondary' => 'ব্লগসমূহ',
                'slug' => 'blogs',
                'url' => 'blogs',
                'description' => null,
                'description_secondary' => null,
                'is_active' => true,
                'is_default' => true,
                'is_editable' => false,
            ],
            [
                'title' => 'About Us',
                'title_secondary' => 'আমাদের সম্পর্কে',
                'slug' => 'about-us',
                'url' => 'about-us',
                'description' => $faker->randomHtml(4, rand(4, 10)),
                'description_secondary' => $this->secondaryHtmlBlock(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Privacy Policy',
                'title_secondary' => 'গোপনীয়তা নীতি',
                'slug' => 'privacy-policy',
                'url' => 'privacy-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Terms of Service',
                'title_secondary' => 'পরিষেবার শর্তাবলী',
                'slug' => 'terms-and-conditions',
                'url' => 'terms-and-conditions',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
                'is_active' => true,
                'is_default' => true,
                'is_editable' => true,
            ],
            [
                'title' => 'Return policy / Refund Policy',
                'title_secondary' => 'রিটার্ন ও রিফান্ড নীতি',
                'slug' => 'return-and-refund-policy',
                'url' => 'page/return-and-refund-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
                'is_active' => true,
                'is_default' => false,
                'is_editable' => true,
            ],
            [
                'title' => 'Shipping & Delivery Policy',
                'title_secondary' => 'শিপিং ও ডেলিভারি নীতি',
                'slug' => 'shipping-and-delivery-policy',
                'url' => 'page/shipping-and-delivery-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
                'is_active' => true,
                'is_default' => false,
                'is_editable' => true,
            ],
        ];

        foreach ($pages as $page) {
            $exists = Page::where('slug', $page['slug'])->first();
            if (!$exists) {
                Page::create($page);
            }
        }
    }

    private function secondaryHtmlBlock(): string
    {
        return '<h2>পৃষ্ঠার বিষয়বস্তু</h2><p>এটি একটি পরীক্ষামূলক বাংলা লেখা যা স্ট্যাটিক পৃষ্ঠা এবং বহু-ভাষা সমর্থন প্রদর্শনে সহায়তা করে।</p><p>এই বিষয়বস্তুটি পরে উপযুক্ত নীতি বা সূচনামূলক পৃষ্ঠার জন্য প্রকৃত বিষয়বস্তু দিয়ে প্রতিস্থাপন করা যেতে পারে।</p>';
    }
}
