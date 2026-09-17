<?php

namespace Database\Seeders;

use App\Models\SupportItem;
use Illuminate\Database\Seeder;

class SupportItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'icon' => 'assets/icons/secure-payment.svg',
                'title' => 'Secure Payments',
                'secondary_title' => 'নিরাপদ পেমেন্ট',
                'description' => '100% safe & trusted',
                'secondary_description' => '১০০% নিরাপদ ও বিশ্বস্ত',
                'order' => 1,
            ],
            [
                'icon' => 'assets/icons/truck-time.svg',
                'title' => 'Free Delivery',
                'secondary_title' => 'ফ্রি ডেলিভারি',
                'description' => 'On orders over 999',
                'secondary_description' => '৯৯৯+ টাকার অর্ডারে',
                'order' => 2,
            ],
            [
                'icon' => 'assets/icons/card_support.svg',
                'title' => '100% Authentic',
                'secondary_title' => '১০০% খাঁটি',
                'description' => 'Genuine products only',
                'secondary_description' => 'শুধুমাত্র খাঁটি পণ্য',
                'order' => 3,
            ],
            [
                'icon' => 'assets/icons/support.svg',
                'title' => '24/7 Support',
                'secondary_title' => '২৪/৭ সাপোর্ট',
                'description' => 'We are always here',
                'secondary_description' => 'আমরা সবসময় আছি',
                'order' => 4,
            ],
            [
                'icon' => 'assets/icons/easy-return.svg',
                'title' => 'Easy Returns',
                'secondary_title' => 'সহজ রিটার্ন',
                'description' => 'Hassle free returns',
                'secondary_description' => 'কোনো ঝামেলা ছাড়াই রিটার্ন',
                'order' => 5,
            ],
        ];

        foreach ($items as $item) {
            SupportItem::updateOrCreate(
                ['title' => $item['title']],
                array_merge($item, ['is_active' => true])
            );
        }
    }
}
