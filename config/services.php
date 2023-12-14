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
        'client_id' => '223161325495-7qeou2f1af7o68vt055r8vf3loo7dbk9.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/programeur/public/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '299868608878517',
        'client_secret' => '1464a43cb8777234bd70fce160196844',
        'redirect' => 'http://localhost/programeur/public/login/facebook/callback',
    ],

    'github' => [
        'client_id' => 'a59d6c70839b6ba214e1',
        'client_secret' => '9c2b6200375dc147bcdb943ce4fc083605263f97',
        'redirect' => 'http://localhost/programeur/public/login/github/callback',
    ],


];
