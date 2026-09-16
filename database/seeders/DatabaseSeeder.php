<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(GeneraleSettingSeeder::class);
        $this->call(LegalPageSeeder::class);
        $this->call(PaymentGatewaySeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(ThemeColorSeeder::class);
        $this->call(SocialAuthSeeder::class);
        $this->call(VerifyManageSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(SupportItemSeeder::class);

        $this->call(CatalogSlugSeeder::class);
        $this->call(WalletSeeder::class);
        $this->command->info('Database seeded successfully');

        // clear cache
        Artisan::call('cache:clear');
    }
}
