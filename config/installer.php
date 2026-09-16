<?php

return [

    'name' => 'AlphaGen eCommerce Installer',

    /*
    |--------------------------------------------------------------------------
    | Seeder run permission here
    |--------------------------------------------------------------------------
    */
    'seeder_run' => true,

    /*
    |--------------------------------------------------------------------------
    | minimum php version
    |--------------------------------------------------------------------------
    */
    'minPhpVersion' => '8.2.0',

    /*
    |--------------------------------------------------------------------------
    | Php and server Requirements
    |--------------------------------------------------------------------------
    | php extensions and apache modules requirements
    */
    'php_extensions' => [
        'mysqli',
        'openssl',
        'pdo',
        'mbstring',
        'JSON',
        'cURL',
        'fileinfo',
        'gmp',
        'xml',
        'zip',
        'sodium',
        'bcMath',
    ],

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    | This is the default Laravel folders permissions, if your application
    | requires more permissions just add them to the array list bellow.
    |
    */
    'permissions' => [
        'storage/' => 777,
        'bootstrap/' => 777,
        'app/Providers/' => 775,
        'routes/' => 775,
        'lang/' => 775,
    ],

    /*
    |--------------------------------------------------------------------------
    | Update commands
    |--------------------------------------------------------------------------
    | defind your update commands
    |--------------------------------------------------------------------------
    */
    'update_commands' => [
        'composer update --no-interaction',
        'php artisan migrate --force', // if exists any new migration file then it will migrate
        'php artisan cache:clear',
        'php artisan db:Seed PermissionSeeder --force', // if exists any new permission then it will create
        'php artisan db:seed PaymentGatewaySeeder --force', // if exists any new payment gateway then it will create
    ],
];