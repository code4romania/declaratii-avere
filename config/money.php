<?php

declare(strict_types=1);

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel money
     |--------------------------------------------------------------------------
     */
    'locale' => config('app.locale', 'en_US'),
    'defaultCurrency' => config('app.currency', 'RON'),
    'defaultFormatter' => null,
    'defaultSerializer' => null,
    'isoCurrenciesPath' => is_dir(__DIR__ . '/../vendor')
        ? __DIR__ . '/../vendor/moneyphp/money/resources/currency.php'
        : __DIR__ . '/../../../moneyphp/money/resources/currency.php',
    'currencies' => [
        'iso' => [
            'RON',
            'EUR',
            'USD',
            'XAU',
            'AUD',
            'CAD',
            'CHF',
            'CZK',
            'DKK',
            'EGP',
            'GBP',
            'HUF',
            'JPY',
            'MDL',
            'NOK',
            'PLN',
            'SEK',
            'TRY',
            'XDR',
            'RUB',
            'BGN',
            'ZAR',
            'BRL',
            'CNY',
            'INR',
            'KRW',
            'MXN',
            'NZD',
            'RSD',
            'UAH',
        ],
        'bitcoin' => null,
        'custom' => [
            // 'MY1' => 2,
            // 'MY2' => 3
        ],
    ],
];
