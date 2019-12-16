<?php
return [
    'controllers' => [
        'factories' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => \Statistics\V1\Rpc\Commissions\CommissionsControllerFactory::class,
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => \Statistics\V1\Rpc\ServiceTips\ServiceTipsControllerFactory::class,
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => \Statistics\V1\Rpc\DealerTips\DealerTipsControllerFactory::class,
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => \Statistics\V1\Rpc\Expenses\ExpensesControllerFactory::class,
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => \Statistics\V1\Rpc\TotalCashin\TotalCashinControllerFactory::class,
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
            'statistics.rpc.expenses' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/expenses',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\Expenses\\Controller',
                        'action' => 'expenses',
                    ],
                ],
            ],
            'statistics.rpc.total-cashin' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/total-cashin',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\TotalCashin\\Controller',
                        'action' => 'totalCashin',
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
            3 => 'statistics.rpc.expenses',
            4 => 'statistics.rpc.total-cashin',
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
        'Statistics\\V1\\Rpc\\Expenses\\Controller' => [
            'service_name' => 'Expenses',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.expenses',
        ],
        'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => [
            'service_name' => 'TotalCashin',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.total-cashin',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => 'Json',
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
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => [
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
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => [
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
