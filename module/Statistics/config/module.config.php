<?php
return [
    'controllers' => [
        'factories' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => \Statistics\V1\Rpc\Commissions\CommissionsControllerFactory::class,
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => \Statistics\V1\Rpc\ServiceTips\ServiceTipsControllerFactory::class,
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => \Statistics\V1\Rpc\DealerTips\DealerTipsControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'statistics.rpc.commissions' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/commissions',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\Commissions\\Controller',
                        'action' => 'commissions',
                    ],
                ],
            ],
            'statistics.rpc.service-tips' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/service-tips',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\ServiceTips\\Controller',
                        'action' => 'serviceTips',
                    ],
                ],
            ],
            'statistics.rpc.dealer-tips' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/dealer-tips',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\DealerTips\\Controller',
                        'action' => 'dealerTips',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'statistics.rpc.commissions',
            1 => 'statistics.rpc.service-tips',
            2 => 'statistics.rpc.dealer-tips',
        ],
    ],
    'zf-rpc' => [
        'Statistics\\V1\\Rpc\\Commissions\\Controller' => [
            'service_name' => 'Commissions',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.commissions',
        ],
        'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => [
            'service_name' => 'ServiceTips',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.service-tips',
        ],
        'Statistics\\V1\\Rpc\\DealerTips\\Controller' => [
            'service_name' => 'DealerTips',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'statistics.rpc.dealer-tips',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [],
    ],
    'zf-rest' => [],
    'zf-hal' => [
        'metadata_map' => [],
    ],
];
