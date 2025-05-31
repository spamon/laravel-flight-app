<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'aviationstack' => [
        'key' => env('AVIATIONSTACK_API_KEY'),
        'base_url' => 'https://api.aviationstack.com/v1/',
    ],

    // Add this to your config/services.php file

    'weatherapi' => [
        'key' => env('WEATHERAPI_KEY'),
    ],

    // // config/services.php
    // 'aviation_edge' => [
    //     'api_key' => env('AVIATION_EDGE_API_KEY'),
    //     'base_url' => 'https://aviation-edge.com/v2/public',
    // ],


];
