<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'link' => 'https://www.facebook.com/alphagen',
                'logo' => '/assets/social/facebook.png',
                'name' => 'Facebook',
            ],
            [
                'link' => 'https://www.linkedin.com/company/alphagen',
                'logo' => '/assets/social/linkedin.png',
                'name' => 'LinkedIn',
            ],
            [
                'link' => null,
                'logo' => '/assets/social/instagram.png',
                'name' => 'Instagram',
            ],
            [
                'link' => 'https://www.youtube.com/@alphagen',
                'logo' => '/assets/social/youtube.png',
                'name' => 'YouTube',
            ],
            [
                'link' => null,
                'logo' => '/assets/social/whatsapp.png',
                'name' => 'WhatsApp',
            ],
            [
                'link' => 'https://x.com/alphagen',
                'logo' => '/assets/social/twitter.png',
                'name' => 'Twitter',
            ],
            [
                'link' => null,
                'logo' => '/assets/social/telegram.png',
                'name' => 'Telegram',
            ],
            [
                'link' => null,
                'logo' => '/assets/social/google-plus.png',
                'name' => 'Google Plus',
            ],
        ];

        foreach ($data as $item) {
            $exists = SocialLink::where('name', $item['name'])->first();
            if (!$exists) {
                SocialLink::create($item);
            }
        }
    }
}
