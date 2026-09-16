<?php

namespace Database\Seeders;

use App\Models\ThemeColor;
use Illuminate\Database\Seeder;

class ThemeColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThemeColor::truncate();

        $this->defaultColor();
    }

    private function defaultColor()
    {
        $color = [
            'primary' => '#EE456B',
            'secondary' => '#FEE5E8',
            'variant_50' => '#FFF1F3',
            'variant_100' => '#FEE5E8',
            'variant_200' => '#FCCFD6',
            'variant_300' => '#FAA7B5',
            'variant_400' => '#F7758F',
            'variant_500' => '#EE456B',
            'variant_600' => '#DD2C5C',
            'variant_700' => '#B91747',
            'variant_800' => '#9B1642',
            'variant_900' => '#84173E',
            'variant_950' => '#4A071D',
            'is_default' => true,
        ];

        ThemeColor::create($color);
    }
}
