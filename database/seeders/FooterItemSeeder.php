<?php

namespace Database\Seeders;

use App\Models\Footer;
use App\Models\FooterItem;
use App\Models\GeneraleSetting;
use Illuminate\Database\Seeder;

class FooterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterItem::query()->delete();

        $generaleSetting = GeneraleSetting::first();

        $footerItems = [
            // Footer 1
            [
                [
                    'id' => 1,
                    'footer_id' => 1,
                    'type' => 'logo',
                    'title' => null,
                    'secondary_title' => null,
                    'url' => null,
                    'is_active' => 1,
                    'order' => 0,
                    'is_default' => 1,
                ],
                [
                    'id' => 2,
                    'footer_id' => 1,
                    'type' => 'text',
                    'title' => $generaleSetting?->footer_description ?? 'The ultimate all-in-one solution for your eCommerce business worldwide',
                    'secondary_title' => 'বিশ্বব্যাপী আপনার ই-কমার্স ব্যবসার জন্য সর্বোত্তম সর্বাঙ্গীণ সমাধান',
                    'url' => null,
                    'is_active' => 1,
                    'order' => 1,
                    'is_default' => 1,
                ],
                [
                    'id' => 3,
                    'footer_id' => 1,
                    'type' => 'phone',
                    'title' => $generaleSetting?->footer_phone ?? '0123456789',
                    'secondary_title' => $generaleSetting?->footer_phone ?? '0123456789',
                    'url' => null,
                    'is_active' => 1,
                    'order' => 2,
                    'is_default' => 1,
                ],
                [
                    'id' => 4,
                    'footer_id' => 1,
                    'type' => 'email',
                    'title' => $generaleSetting?->footer_email ?? 'admin@example.com',
                    'secondary_title' => $generaleSetting?->footer_email ?? 'admin@example.com',
                    'url' => null,
                    'is_active' => 1,
                    'order' => 3,
                    'is_default' => 1,
                ],
                [
                    'id' => 5,
                    'footer_id' => 1,
                    'type' => 'social_links',
                    'title' => null,
                    'secondary_title' => null,
                    'url' => null,
                    'is_active' => 1,
                    'order' => 4,
                    'is_default' => 1,
                ],
            ],

            // Footer 2 - Shop
            [
                [
                    'id' => 6,
                    'footer_id' => 2,
                    'type' => 'link',
                    'title' => 'All Products',
                    'secondary_title' => 'সকল পণ্য',
                    'icon' => 'layout-grid',
                    'url' => '/products',
                    'is_active' => 1,
                    'order' => 0,
                    'is_default' => 0,
                ],
                [
                    'id' => 7,
                    'footer_id' => 2,
                    'type' => 'link',
                    'title' => 'Digital Products',
                    'secondary_title' => 'ডিজিটাল পণ্য',
                    'icon' => 'monitor',
                    'url' => '/',
                    'is_active' => 1,
                    'order' => 1,
                    'is_default' => 0,
                ],
                [
                    'id' => 8,
                    'footer_id' => 2,
                    'type' => 'link',
                    'title' => 'Top Rated Products',
                    'secondary_title' => 'সর্বোচ্চ রেটেড পণ্য',
                    'icon' => 'star',
                    'url' => '/most-popular',
                    'is_active' => 1,
                    'order' => 2,
                    'is_default' => 0,
                ],
                [
                    'id' => 9,
                    'footer_id' => 2,
                    'type' => 'link',
                    'title' => 'Best Deals',
                    'secondary_title' => 'সেরা ডিল',
                    'icon' => 'tag',
                    'url' => '/best-deal',
                    'is_active' => 1,
                    'order' => 3,
                    'is_default' => 0,
                ],
                // [
                //     'id' => 10,
                //     'footer_id' => 2,
                //     'type' => 'link',
                //     'title' => 'New Arrivals',
                //     'secondary_title' => 'নতুন সংযোজন',
                //     'icon' => 'shopping-bag',
                //     'url' => '/new-arrivals',
                //     'is_active' => 1,
                //     'order' => 4,
                //     'is_default' => 0,
                // ],
                // [
                //     'id' => 11,
                //     'footer_id' => 2,
                //     'type' => 'link',
                //     'title' => 'Flash Deals',
                //     'secondary_title' => 'ফ্ল্যাশ ডিল',
                //     'icon' => 'zap',
                //     'url' => '/flash-sale',
                //     'is_active' => 1,
                //     'order' => 5,
                //     'is_default' => 0,
                // ],
                // [
                //     'id' => 12,
                //     'footer_id' => 2,
                //     'type' => 'link',
                //     'title' => 'Gift Cards',
                //     'secondary_title' => 'গিফট কার্ড',
                //     'icon' => 'gift',
                //     'url' => '/gift-cards',
                //     'is_active' => 1,
                //     'order' => 6,
                //     'is_default' => 0,
                // ],
            ],

            // Footer 3 - Customer Service
            [
                [
                    'id' => 13,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'Help Center',
                    'secondary_title' => 'সহায়তা কেন্দ্র',
                    'icon' => 'headset',
                    'url' => '/support',
                    'is_active' => 1,
                    'order' => 0,
                    'is_default' => 0,
                ],
                // [
                //     'id' => 14,
                //     'footer_id' => 3,
                //     'type' => 'link',
                //     'title' => 'Track Your Order',
                //     'secondary_title' => 'আপনার অর্ডার ট্র্যাক করুন',
                //     'icon' => 'package',
                //     'url' => '/order-history',
                //     'is_active' => 1,
                //     'order' => 1,
                //     'is_default' => 0,
                // ],
                [
                    'id' => 15,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'Easy Returns',
                    'secondary_title' => 'সহজ রিটার্ন',
                    'icon' => 'refresh-cw',
                    'url' => '/return-policy',
                    'is_active' => 1,
                    'order' => 2,
                    'is_default' => 0,
                ],
                [
                    'id' => 16,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'Shipping Policy',
                    'secondary_title' => 'শিপিং নীতি',
                    'icon' => 'truck',
                    'url' => '/shipping-policy',
                    'is_active' => 1,
                    'order' => 3,
                    'is_default' => 0,
                ],
                [
                    'id' => 17,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'Payment Methods',
                    'secondary_title' => 'পেমেন্ট পদ্ধতি',
                    'icon' => 'credit-card',
                    'url' => '/',
                    'is_active' => 1,
                    'order' => 4,
                    'is_default' => 0,
                ],
                [
                    'id' => 18,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'FAQ',
                    'secondary_title' => 'সাধারণ জিজ্ঞাসা',
                    'icon' => 'circle-help',
                    'url' => '/',
                    'is_active' => 1,
                    'order' => 5,
                    'is_default' => 0,
                ],
                [
                    'id' => 19,
                    'footer_id' => 3,
                    'type' => 'link',
                    'title' => 'Contact Us',
                    'secondary_title' => 'যোগাযোগ করুন',
                    'icon' => 'mail',
                    'url' => '/contact-us',
                    'is_active' => 1,
                    'order' => 6,
                    'is_default' => 0,
                ],
            ],

            // Footer 4 - Company
            [
                [
                    'id' => 20,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'About Us',
                    'secondary_title' => 'আমাদের সম্পর্কে',
                    'icon' => 'users',
                    'url' => '/about-us',
                    'is_active' => 1,
                    'order' => 0,
                    'is_default' => 0,
                ],
                // [
                //     'id' => 21,
                //     'footer_id' => 4,
                //     'type' => 'link',
                //     'title' => 'Careers',
                //     'secondary_title' => 'ক্যারিয়ার',
                //     'icon' => 'briefcase',
                //     'url' => '/careers',
                //     'is_active' => 1,
                //     'order' => 1,
                //     'is_default' => 0,
                // ],
                [
                    'id' => 22,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'Blog',
                    'secondary_title' => 'ব্লগ',
                    'icon' => 'file-text',
                    'url' => '/blogs',
                    'is_active' => 1,
                    'order' => 2,
                    'is_default' => 0,
                ],
                [
                    'id' => 23,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'Terms & Conditions',
                    'secondary_title' => 'শর্তাবলী',
                    'icon' => 'scroll-text',
                    'url' => '/terms-and-conditions',
                    'is_active' => 1,
                    'order' => 3,
                    'is_default' => 0,
                ],
                [
                    'id' => 24,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'Privacy Policy',
                    'secondary_title' => 'গোপনীয়তা নীতি',
                    'icon' => 'shield-check',
                    'url' => '/privacy-policy',
                    'is_active' => 1,
                    'order' => 4,
                    'is_default' => 0,
                ],
                [
                    'id' => 25,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'Return & Refund Policy',
                    'secondary_title' => 'রিটার্ন ও রিফান্ড নীতি',
                    'icon' => 'rotate-ccw',
                    'url' => '/return-policy',
                    'is_active' => 1,
                    'order' => 5,
                    'is_default' => 0,
                ],
                [
                    'id' => 26,
                    'footer_id' => 4,
                    'type' => 'link',
                    'title' => 'Become a Seller',
                    'secondary_title' => 'সেলার হোন',
                    'icon' => 'store',
                    'url' => '/shop/register',
                    'shop_type' => 'multi',
                    'target' => '_blank',
                    'is_active' => 1,
                    'order' => 6,
                    'is_default' => true,
                ],
            ],

            // Footer 5
            [
                [
                    'id' => 27,
                    'footer_id' => 5,
                    'type' => 'app_store',
                    'title' => null,
                    'secondary_title' => null,
                    'url' => null,
                    'is_active' => 1,
                    'order' => 0,
                    'is_default' => true,
                ],
            ],
        ];

        $footers = Footer::all();

        foreach ($footers as $key => $footer) {

            $items = $footerItems[$key];

            foreach ($items as $item) {

                $item['footer_id'] = $footer->id;
                FooterItem::create($item);
            }
        }
    }
}
