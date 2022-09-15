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

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID', '662350853364-sjp3lddf7d1nv1k55dmm4mjrhjk7pcko.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', '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'),
        'redirect'      => env('GOOGLE_REDIRECT', 'http://localhost:8000/callback/google')
    ],

    'facebook' => [
        'client_id' => env('FB_CLIENT_ID', '413853610686643'),
        'client_secret' => env('FB_CLIENT_SECRET', '93d6995258c26ce55509c515395166d4'),
        'redirect' => env('FB_REDIRECT', 'http://localhost:8000/callback/facebook'),
    ],
];
