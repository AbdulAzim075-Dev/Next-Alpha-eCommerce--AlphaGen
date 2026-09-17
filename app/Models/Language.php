<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($language) {
            Cache::forget('languages');
            Cache::forget('lang_direction_' . $language->name);
        });

        static::updated(function ($language) {
            Cache::forget('languages');
            Cache::forget('lang_direction_' . $language->name);
        });

        static::deleted(function ($language) {
            Cache::forget('languages');
            Cache::forget('lang_direction_' . $language->name);
        });
    }
}
