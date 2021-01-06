<?php

return [
    'asset_types' => [
        'icons' => [
            'value' => 'icons',
            'label' => 'Icons'
        ],
        'illustration' => [
            'value' => 'illustration',
            'label' => 'Illustration'
        ],
        '3d' => [
            'value' => '3d',
            'label' => '3D illustration'
        ],
        'mockup' => [
            'value' => 'mockup',
            'label' => 'Mockup'
        ]
    ],
    'item_statuses' => [
        'published' => 'Published',
        'draft' => 'Draft'
    ],

    'subscription_models' => [
        'premium_package_price_yearly' => [
            'amount' => 59,
            'price_id' => env('PREMIUM_PACKAGE_PRICE_YEARLY', 'price_1I6fj4G7w1Vw7NSaZC2vPCFK')
        ],
        'asset_set_price_onetime' => [
            'amount' => 39,
            'price_id' => env('ASSET_SET_PRICE_ONETIME', 'price_1I6gdFG7w1Vw7NSaTeX2BTNd')
        ]
    ],
];
