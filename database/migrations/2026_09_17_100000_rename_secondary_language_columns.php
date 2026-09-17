<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Rename the old "Arabic" columns (*_ar / ar_*) to the neutral
     * secondary-language names (*_secondary / secondary_*).
     *
     * Each rename is guarded so this migration is safe on both:
     *  - existing installs (old columns still present) and
     *  - fresh installs (original migrations already create *_secondary).
     */
    public function up(): void
    {
        $renames = [
            'categories'    => [['name_ar', 'name_secondary'], ['description_ar', 'description_secondary']],
            'sub_categories'=> [['name_ar', 'name_secondary'], ['short_description_ar', 'short_description_secondary']],
            'brands'        => [['name_ar', 'name_secondary']],
            'colors'        => [['name_ar', 'name_secondary']],
            'sizes'         => [['name_ar', 'name_secondary']],
            'products'      => [['name_ar', 'name_secondary'], ['short_description_ar', 'short_description_secondary'], ['description_ar', 'description_secondary']],
            'shops'         => [['name_ar', 'name_secondary']],
            'blogs'         => [['title_ar', 'title_secondary'], ['description_ar', 'description_secondary']],
            'legal_pages'   => [['title_ar', 'title_secondary'], ['description_ar', 'description_secondary']],
            'pages'         => [['title_ar', 'title_secondary'], ['description_ar', 'description_secondary']],
            'menus'         => [['ar_name', 'secondary_name']],
            'footers'       => [['ar_title', 'secondary_title']],
            'footer_items'  => [['ar_title', 'secondary_title']],
            'support_items' => [['ar_title', 'secondary_title'], ['ar_description', 'secondary_description']],
        ];

        foreach ($renames as $table => $columns) {
            foreach ($columns as [$from, $to]) {
                if (Schema::hasColumn($table, $from)) {
                    Schema::table($table, function (Blueprint $table) use ($from, $to) {
                        $table->renameColumn($from, $to);
                    });
                }
            }
        }
    }

    public function down(): void
    {
        $renames = [
            'categories'    => [['name_secondary', 'name_ar'], ['description_secondary', 'description_ar']],
            'sub_categories'=> [['name_secondary', 'name_ar'], ['short_description_secondary', 'short_description_ar']],
            'brands'        => [['name_secondary', 'name_ar']],
            'colors'        => [['name_secondary', 'name_ar']],
            'sizes'         => [['name_secondary', 'name_ar']],
            'products'      => [['name_secondary', 'name_ar'], ['short_description_secondary', 'short_description_ar'], ['description_secondary', 'description_ar']],
            'shops'         => [['name_secondary', 'name_ar']],
            'blogs'         => [['title_secondary', 'title_ar'], ['description_secondary', 'description_ar']],
            'legal_pages'   => [['title_secondary', 'title_ar'], ['description_secondary', 'description_ar']],
            'pages'         => [['title_secondary', 'title_ar'], ['description_secondary', 'description_ar']],
            'menus'         => [['secondary_name', 'ar_name']],
            'footers'       => [['secondary_title', 'ar_title']],
            'footer_items'  => [['secondary_title', 'ar_title']],
            'support_items' => [['secondary_title', 'ar_title'], ['secondary_description', 'ar_description']],
        ];

        foreach ($renames as $table => $columns) {
            foreach ($columns as [$from, $to]) {
                if (Schema::hasColumn($table, $from)) {
                    Schema::table($table, function (Blueprint $table) use ($from, $to) {
                        $table->renameColumn($from, $to);
                    });
                }
            }
        }
    }
};