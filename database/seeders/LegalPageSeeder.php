<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use Faker\Factory;
use Illuminate\Database\Seeder;

class LegalPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        // Legal Pages
        $legalPages = [
            [
                'title' => 'Privacy Policy',
                'title_secondary' => 'গোপনীয়তা নীতি',
                'slug' => 'privacy-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
            ],
            [
                'title' => 'Terms of Service',
                'title_secondary' => 'পরিষেবার শর্তাবলী',
                'slug' => 'terms-and-conditions',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
            ],
            [
                'title' => 'Return policy / Refund Policy',
                'title_secondary' => 'রিটার্ন ও রিফান্ড নীতি',
                'slug' => 'return-and-refund-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
            ],
            [
                'title' => 'Shipping & Delivery Policy',
                'title_secondary' => 'শিপিং ও ডেলিভারি নীতি',
                'slug' => 'shipping-and-delivery-policy',
                'description' => $faker->randomHtml(),
                'description_secondary' => $this->secondaryHtmlBlock(),
            ],
            [
                'title' => 'About Us',
                'title_secondary' => 'আমাদের সম্পর্কে',
                'slug' => 'about-us',
                'description' => $faker->randomHtml(4, rand(4, 10)),
                'description_secondary' => $this->secondaryHtmlBlock(),
            ],
        ];

        foreach ($legalPages as $legalPage) {
            LegalPage::create($legalPage);
        }
    }

    private function secondaryHtmlBlock(): string
    {
        return '<h2>আইনি বিষয়বস্তু</h2><p>এটি আইনি পৃষ্ঠা প্রদর্শনে বহু-ভাষা সমর্থন সহ বাংলা পরীক্ষামূলক বিষয়বস্তু।</p><p>এই লেখাটি পরে প্রয়োজনীয় অফিসিয়াল বিষয়বস্তু দিয়ে আপডেট করা যেতে পারে।</p>';
    }
}
