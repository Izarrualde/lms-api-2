<?php
return [
    'controllers' => [
        'factories' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => \Statistics\V1\Rpc\Commissions\CommissionsControllerFactory::class,
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => \Statistics\V1\Rpc\ServiceTips\ServiceTipsControllerFactory::class,
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => \Statistics\V1\Rpc\DealerTips\DealerTipsControllerFactory::class,
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => \Statistics\V1\Rpc\Expenses\ExpensesControllerFactory::class,
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => \Statistics\V1\Rpc\TotalCashin\TotalCashinControllerFactory::class,
            'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => \Statistics\V1\Rpc\HoursPlayed\HoursPlayedControllerFactory::class,
            'Statistics\\V1\\Rpc\\Players\\Controller' => \Statistics\V1\Rpc\Players\PlayersControllerFactory::class,
            'Statistics\\V1\\Rpc\\RakeRace\\Controller' => \Statistics\V1\Rpc\RakeRace\RakeRaceControllerFactory::class,
            'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => \Statistics\V1\Rpc\TipsPerDealer\TipsPerDealerControllerFactory::class,
            'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => \Statistics\V1\Rpc\TipsPerService\TipsPerServiceControllerFactory::class,
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
            'statistics.rpc.hours-played' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/hours-played',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\HoursPlayed\\Controller',
                        'action' => 'hoursPlayed',
                    ],
                ],
            ],
            'statistics.rpc.players' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/players',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\Players\\Controller',
                        'action' => 'players',
                    ],
                ],
            ],
            'statistics.rpc.rake-race' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/rake-race',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\RakeRace\\Controller',
                        'action' => 'rakeRace',
                    ],
                ],
            ],
            'statistics.rpc.tips-per-dealer' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/tips-per-dealer',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller',
                        'action' => 'tipsPerDealer',
                    ],
                ],
            ],
            'statistics.rpc.tips-per-service' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/statistics/tips-per-service',
                    'defaults' => [
                        'controller' => 'Statistics\\V1\\Rpc\\TipsPerService\\Controller',
                        'action' => 'tipsPerService',
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
            5 => 'statistics.rpc.hours-played',
            6 => 'statistics.rpc.players',
            7 => 'statistics.rpc.rake-race',
            8 => 'statistics.rpc.tips-per-dealer',
            9 => 'statistics.rpc.tips-per-service',
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
        'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => [
            'service_name' => 'HoursPlayed',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'statistics.rpc.hours-played',
        ],
        'Statistics\\V1\\Rpc\\Players\\Controller' => [
            'service_name' => 'Players',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.players',
        ],
        'Statistics\\V1\\Rpc\\RakeRace\\Controller' => [
            'service_name' => 'RakeRace',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.rake-race',
        ],
        'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => [
            'service_name' => 'TipsPerDealer',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.tips-per-dealer',
        ],
        'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => [
            'service_name' => 'TipsPerService',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'statistics.rpc.tips-per-service',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\Players\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\RakeRace\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => 'Json',
            'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => 'Json',
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
            'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\Players\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\RakeRace\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => [
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
            'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\Players\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\RakeRace\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => [
                0 => 'application/vnd.statistics.v1+json',
                1 => 'application/json',
            ],
            'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => [
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
    'zf-mvc-auth' => [
        'authorization' => [
            'Statistics\\V1\\Rpc\\Commissions\\Controller' => [
                'actions' => [
                    'commissions' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\DealerTips\\Controller' => [
                'actions' => [
                    'dealerTips' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\ServiceTips\\Controller' => [
                'actions' => [
                    'serviceTips' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\Expenses\\Controller' => [
                'actions' => [
                    'expenses' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\TotalCashin\\Controller' => [
                'actions' => [
                    'totalCashin' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\HoursPlayed\\Controller' => [
                'actions' => [
                    'hoursPlayed' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\Players\\Controller' => [
                'actions' => [
                    'players' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\RakeRace\\Controller' => [
                'actions' => [
                    'rakeRace' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\TipsPerDealer\\Controller' => [
                'actions' => [
                    'tipsPerDealer' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Statistics\\V1\\Rpc\\TipsPerService\\Controller' => [
                'actions' => [
                    'tipsPerService' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
];
