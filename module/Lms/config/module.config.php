<?php
return [
    'service_manager' => [
        'factories' => [
            \Lms\CustomOAuth2Adapter\CustomOAuth2Adapter::class => \Lms\CustomOAuth2Adapter\CustomOAuth2AdapterFactory::class,
            \Lms\V1\Rest\Users\UsersResource::class => \Lms\V1\Rest\Users\UsersResourceFactory::class,
            \Lms\V1\Rest\UserGroups\UserGroupsResource::class => \Lms\V1\Rest\UserGroups\UserGroupsResourceFactory::class,
            \Lms\V1\Rest\Me\MeResource::class => \Lms\V1\Rest\Me\MeResourceFactory::class,
            \Lms\V1\Rest\Awards\AwardsResource::class => \Lms\V1\Rest\Awards\AwardsResourceFactory::class,
            \Lms\V1\Rest\Notifications\NotificationsResource::class => \Lms\V1\Rest\Notifications\NotificationsResourceFactory::class,
            \Lms\V1\Rest\Sessions\SessionsResource::class => \Lms\V1\Rest\Sessions\SessionsResourceFactory::class,
            \Lms\V1\Rest\Buyins\BuyinsResource::class => \Lms\V1\Rest\Buyins\BuyinsResourceFactory::class,
            \Lms\V1\Rest\UsersSession\UsersSessionResource::class => \Lms\V1\Rest\UsersSession\UsersSessionResourceFactory::class,
            \Lms\V1\Rest\Expenses\ExpensesResource::class => \Lms\V1\Rest\Expenses\ExpensesResourceFactory::class,
            \Lms\V1\Rest\DealerTips\DealerTipsResource::class => \Lms\V1\Rest\DealerTips\DealerTipsResourceFactory::class,
            \Lms\V1\Rest\ServiceTips\ServiceTipsResource::class => \Lms\V1\Rest\ServiceTips\ServiceTipsResourceFactory::class,
            \Lms\V1\Rest\Commissions\CommissionsResource::class => \Lms\V1\Rest\Commissions\CommissionsResourceFactory::class,
            \Lms\Service\RakebackService::class => \Lms\Service\Factory\RakebackServiceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'lms.rest.users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:users_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Users\\Controller',
                    ],
                ],
            ],
            'lms.rest.user-groups' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user-groups[/:user_groups_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\UserGroups\\Controller',
                    ],
                ],
            ],
            'lms.rest.me' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/me[/:me_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Me\\Controller',
                    ],
                ],
            ],
            'lms.rest.awards' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/awards[/:awards_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Awards\\Controller',
                    ],
                ],
            ],
            'lms.rpc.register-device' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/registerDevice',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\RegisterDevice\\Controller',
                        'action' => 'registerDevice',
                    ],
                ],
            ],
            'lms.rest.notifications' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/notifications[/:notifications_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Notifications\\Controller',
                    ],
                ],
            ],
            'lms.rpc.send-notification' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/notifications/:notification_id/platform/:platform_id/send',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\SendNotification\\Controller',
                        'action' => 'sendNotification',
                    ],
                ],
            ],
            'lms.rest.sessions' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions[/:session_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Sessions\\Controller',
                    ],
                ],
            ],
            'lms.rest.buyins' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/buyins[/:buyins_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Buyins\\Controller',
                    ],
                ],
            ],
            'lms.rest.users-session' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/users-session[/:users_session_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\UsersSession\\Controller',
                    ],
                ],
            ],
            'lms.rest.expenses' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/expenses[/:expenses_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Expenses\\Controller',
                    ],
                ],
            ],
            'lms.rest.dealer-tips' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/dealer-tips[/:dealer_tips_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\DealerTips\\Controller',
                    ],
                ],
            ],
            'lms.rest.service-tips' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/service-tips[/:service_tips_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\ServiceTips\\Controller',
                    ],
                ],
            ],
            'lms.rest.commissions' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/commissions[/:commissions_id]',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rest\\Commissions\\Controller',
                    ],
                ],
            ],
            'lms.rpc.rakeback-algorithms' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/rakeback-algorithms',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller',
                        'action' => 'rakebackAlgorithms',
                    ],
                ],
            ],
            'lms.rpc.play-session' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/play',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\PlaySession\\Controller',
                        'action' => 'playSession',
                    ],
                ],
            ],
            'lms.rpc.stop-session' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/stop',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\StopSession\\Controller',
                        'action' => 'stopSession',
                    ],
                ],
            ],
            'lms.rpc.close-user-session' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users-session/:user_session_id/close',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\CloseUserSession\\Controller',
                        'action' => 'closeUserSession',
                    ],
                ],
            ],
            'lms.rpc.calculate-rakeback' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/calculate',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\CalculateRakeback\\Controller',
                        'action' => 'calculateRakeback',
                    ],
                ],
            ],
            'lms.rpc.revision-session' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sessions/:session_id/revision',
                    'defaults' => [
                        'controller' => 'Lms\\V1\\Rpc\\RevisionSession\\Controller',
                        'action' => 'revisionSession',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'lms.rest.users',
            1 => 'lms.rest.user-groups',
            2 => 'lms.rest.me',
            3 => 'lms.rest.awards',
            4 => 'lms.rpc.register-device',
            5 => 'lms.rest.notifications',
            6 => 'lms.rpc.send-notification',
            7 => 'lms.rest.sessions',
            9 => 'lms.rest.buyins',
            10 => 'lms.rest.users-session',
            12 => 'lms.rest.expenses',
            13 => 'lms.rest.dealer-tips',
            14 => 'lms.rest.service-tips',
            15 => 'lms.rest.commissions',
            17 => 'lms.rpc.rakeback-algorithms',
            18 => 'lms.rpc.play-session',
            19 => 'lms.rpc.stop-session',
            20 => 'lms.rpc.close-user-session',
            21 => 'lms.rpc.calculate-rakeback',
            22 => 'lms.rpc.revision-session',
        ],
    ],
    'zf-rest' => [
        'Lms\\V1\\Rest\\Users\\Controller' => [
            'listener' => \Lms\V1\Rest\Users\UsersResource::class,
            'route_name' => 'lms.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => 'size',
            'entity_class' => \Solcre\Pokerclub\Entity\UserEntity::class,
            'collection_class' => \Lms\V1\Rest\Users\UsersCollection::class,
            'service_name' => 'Users',
        ],
        'Lms\\V1\\Rest\\UserGroups\\Controller' => [
            'listener' => \Lms\V1\Rest\UserGroups\UserGroupsResource::class,
            'route_name' => 'lms.rest.user-groups',
            'route_identifier_name' => 'user_groups_id',
            'collection_name' => 'user_groups',
            'entity_http_methods' => [],
            'collection_http_methods' => [],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Lms\Entity\UserGroupEntity::class,
            'collection_class' => \Lms\V1\Rest\UserGroups\UserGroupsCollection::class,
            'service_name' => 'UserGroups',
        ],
        'Lms\\V1\\Rest\\Me\\Controller' => [
            'listener' => \Lms\V1\Rest\Me\MeResource::class,
            'route_name' => 'lms.rest.me',
            'route_identifier_name' => 'me_id',
            'collection_name' => 'me',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\MeEntity::class,
            'collection_class' => \Lms\V1\Rest\Me\MeCollection::class,
            'service_name' => 'Me',
        ],
        'Lms\\V1\\Rest\\Awards\\Controller' => [
            'listener' => \Lms\V1\Rest\Awards\AwardsResource::class,
            'route_name' => 'lms.rest.awards',
            'route_identifier_name' => 'awards_id',
            'collection_name' => 'awards',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => 'size',
            'entity_class' => \Solcre\Pokerclub\Entity\AwardEntity::class,
            'collection_class' => \Lms\V1\Rest\Awards\AwardsCollection::class,
            'service_name' => 'Awards',
        ],
        'Lms\\V1\\Rest\\Notifications\\Controller' => [
            'listener' => \Lms\V1\Rest\Notifications\NotificationsResource::class,
            'route_name' => 'lms.rest.notifications',
            'route_identifier_name' => 'notifications_id',
            'collection_name' => 'notifications',
            'entity_http_methods' => [
                0 => 'PUT',
                1 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Lms\Entity\NotificationEntity::class,
            'collection_class' => \Lms\V1\Rest\Notifications\NotificationsCollection::class,
            'service_name' => 'Notifications',
        ],
        'Lms\\V1\\Rest\\Sessions\\Controller' => [
            'listener' => \Lms\V1\Rest\Sessions\SessionsResource::class,
            'route_name' => 'lms.rest.sessions',
            'route_identifier_name' => 'session_id',
            'collection_name' => 'sessions',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\SessionEntity::class,
            'collection_class' => \Lms\V1\Rest\Sessions\SessionsCollection::class,
            'service_name' => 'Sessions',
        ],
        'Lms\\V1\\Rest\\Buyins\\Controller' => [
            'listener' => \Lms\V1\Rest\Buyins\BuyinsResource::class,
            'route_name' => 'lms.rest.buyins',
            'route_identifier_name' => 'buyins_id',
            'collection_name' => 'buyins',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\BuyinSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\Buyins\BuyinsCollection::class,
            'service_name' => 'Buyins',
        ],
        'Lms\\V1\\Rest\\UsersSession\\Controller' => [
            'listener' => \Lms\V1\Rest\UsersSession\UsersSessionResource::class,
            'route_name' => 'lms.rest.users-session',
            'route_identifier_name' => 'users_session_id',
            'collection_name' => 'users_session',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'PATCH',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\UserSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\UsersSession\UsersSessionCollection::class,
            'service_name' => 'UsersSession',
        ],
        'Lms\\V1\\Rest\\Expenses\\Controller' => [
            'listener' => \Lms\V1\Rest\Expenses\ExpensesResource::class,
            'route_name' => 'lms.rest.expenses',
            'route_identifier_name' => 'expenses_id',
            'collection_name' => 'expenses',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\ExpensesSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\Expenses\ExpensesCollection::class,
            'service_name' => 'Expenses',
        ],
        'Lms\\V1\\Rest\\DealerTips\\Controller' => [
            'listener' => \Lms\V1\Rest\DealerTips\DealerTipsResource::class,
            'route_name' => 'lms.rest.dealer-tips',
            'route_identifier_name' => 'dealer_tips_id',
            'collection_name' => 'dealer_tips',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\DealerTipSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\DealerTips\DealerTipsCollection::class,
            'service_name' => 'DealerTips',
        ],
        'Lms\\V1\\Rest\\ServiceTips\\Controller' => [
            'listener' => \Lms\V1\Rest\ServiceTips\ServiceTipsResource::class,
            'route_name' => 'lms.rest.service-tips',
            'route_identifier_name' => 'service_tips_id',
            'collection_name' => 'service_tips',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\ServiceTipSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\ServiceTips\ServiceTipsCollection::class,
            'service_name' => 'ServiceTips',
        ],
        'Lms\\V1\\Rest\\Commissions\\Controller' => [
            'listener' => \Lms\V1\Rest\Commissions\CommissionsResource::class,
            'route_name' => 'lms.rest.commissions',
            'route_identifier_name' => 'commissions_id',
            'collection_name' => 'commissions',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Solcre\Pokerclub\Entity\CommissionSessionEntity::class,
            'collection_class' => \Lms\V1\Rest\Commissions\CommissionsCollection::class,
            'service_name' => 'Commissions',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Lms\\V1\\Rest\\Users\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\UserGroups\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Me\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Awards\\Controller' => 'HalJson',
            'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Notifications\\Controller' => 'HalJson',
            'Lms\\V1\\Rpc\\SendNotification\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Sessions\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Buyins\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\UsersSession\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Expenses\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\DealerTips\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\ServiceTips\\Controller' => 'HalJson',
            'Lms\\V1\\Rest\\Commissions\\Controller' => 'HalJson',
            'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller' => 'Json',
            'Lms\\V1\\Rpc\\PlaySession\\Controller' => 'Json',
            'Lms\\V1\\Rpc\\StopSession\\Controller' => 'Json',
            'Lms\\V1\\Rpc\\CloseUserSession\\Controller' => 'Json',
            'Lms\\V1\\Rpc\\CalculateRakeback\\Controller' => 'Json',
            'Lms\\V1\\Rpc\\RevisionSession\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Lms\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\UserGroups\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Me\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Awards\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rest\\Notifications\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\SendNotification\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rest\\Sessions\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Buyins\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\UsersSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Expenses\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\DealerTips\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\ServiceTips\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Commissions\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rpc\\PlaySession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rpc\\StopSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rpc\\CloseUserSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rpc\\CalculateRakeback\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Lms\\V1\\Rpc\\RevisionSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Lms\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\UserGroups\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Me\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Awards\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Notifications\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\SendNotification\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rest\\Sessions\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\Buyins\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\UsersSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\Expenses\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\DealerTips\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\ServiceTips\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rest\\Commissions\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\PlaySession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\StopSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\CloseUserSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\CalculateRakeback\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
            'Lms\\V1\\Rpc\\RevisionSession\\Controller' => [
                0 => 'application/vnd.lms.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Solcre\Pokerclub\Entity\UserEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Lms\V1\Rest\Users\UsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ],
            \Solcre\Lms\Entity\UserGroupEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.user-groups',
                'route_identifier_name' => 'user_groups_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Lms\V1\Rest\UserGroups\UserGroupsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.user-groups',
                'route_identifier_name' => 'user_groups_id',
                'is_collection' => true,
            ],
            \Solcre\Lms\Entity\MeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.me',
                'route_identifier_name' => 'me_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Lms\V1\Rest\Me\MeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.me',
                'route_identifier_name' => 'me_id',
                'is_collection' => true,
            ],
            \Solcre\Lms\Entity\AwardEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.awards',
                'route_identifier_name' => 'awards_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Lms\V1\Rest\Awards\AwardsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.awards',
                'route_identifier_name' => 'awards_id',
                'is_collection' => true,
            ],
            \Solcre\Lms\Entity\NotificationEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.notifications',
                'route_identifier_name' => 'notifications_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Lms\V1\Rest\Notifications\NotificationsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.notifications',
                'route_identifier_name' => 'notifications_id',
                'is_collection' => true,
            ],
            \Lms\V1\Rest\Sessions\SessionsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.sessions',
                'route_identifier_name' => 'sessions_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\SessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.sessions',
                'route_identifier_name' => 'session_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'max_depth' => 3,
            ],
            \Lms\V1\Rest\Buyins\BuyinsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.buyins',
                'route_identifier_name' => 'buyins_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\BuyinSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.buyins',
                'route_identifier_name' => 'buyins_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'max_depth' => 3,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\BuyinMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Lms\V1\Rest\UsersSession\UsersSessionCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.users-session',
                'route_identifier_name' => 'users_session_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\UserSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.users-session',
                'route_identifier_name' => 'users_session_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\UserSessionMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Lms\V1\Rest\Expenses\ExpensesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.expenses',
                'route_identifier_name' => 'expenses_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\ExpensesSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.expenses',
                'route_identifier_name' => 'expenses_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\ExpenditureMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Lms\V1\Rest\DealerTips\DealerTipsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.dealer-tips',
                'route_identifier_name' => 'dealer_tips_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\DealerTipSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.dealer-tips',
                'route_identifier_name' => 'dealer_tips_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\DealerTipMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Lms\V1\Rest\ServiceTips\ServiceTipsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.service-tips',
                'route_identifier_name' => 'service_tips_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\ServiceTipSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.service-tips',
                'route_identifier_name' => 'service_tips_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\ServiceTipMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Lms\V1\Rest\Commissions\CommissionsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.commissions',
                'route_identifier_name' => 'commissions_id',
                'is_collection' => true,
            ],
            \Solcre\Pokerclub\Entity\CommissionSessionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.commissions',
                'route_identifier_name' => 'commissions_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
                'route_params' => [
                    'session_id' => [
                        0 => \Lms\V1\Mappers\CommissionMapper::class,
                        1 => 'sessionId',
                    ],
                ],
            ],
            \Solcre\Pokerclub\Entity\MeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.me',
                'route_identifier_name' => 'me_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
            \Solcre\Pokerclub\Entity\AwardEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'lms.rest.awards',
                'route_identifier_name' => 'awards_id',
                'hydrator' => \Solcre\SolcreFramework2\Hydrator\EntityHydrator::class,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Lms\\V1\\Rest\\Users\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\Me\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
            'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => [
                'actions' => [
                    'RegisterDevice' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Lms\\V1\\Rpc\\SendNotification\\Controller' => [
                'actions' => [
                    'SendNotification' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'Lms\\V1\\Rest\\Sessions\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\Awards\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
            'Lms\\V1\\Rest\\Notifications\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\Buyins\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\UsersSession\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\Expenses\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\DealerTips\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\ServiceTips\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'Lms\\V1\\Rest\\Commissions\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Lms\\V1\\Rest\\Users\\Controller' => [
            'input_filter' => 'Lms\\V1\\Rest\\Users\\Validator',
        ],
        'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => [
            'input_filter' => 'Lms\\V1\\Rpc\\RegisterDevice\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Lms\\V1\\Rest\\Users\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'email',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'avatar_visible_filename',
            ],
            3 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'avatar_file',
            ],
            4 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'password',
            ],
            5 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'password_confirm',
            ],
        ],
        'Lms\\V1\\Rpc\\RegisterDevice\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'token',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'platform',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => \Lms\V1\Rpc\RegisterDevice\RegisterDeviceControllerFactory::class,
            'Lms\\V1\\Rpc\\SendNotification\\Controller' => \Lms\V1\Rpc\SendNotification\SendNotificationControllerFactory::class,
            'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller' => \Lms\V1\Rpc\RakebackAlgorithms\RakebackAlgorithmsControllerFactory::class,
            'Lms\\V1\\Rpc\\PlaySession\\Controller' => \Lms\V1\Rpc\PlaySession\PlaySessionControllerFactory::class,
            'Lms\\V1\\Rpc\\StopSession\\Controller' => \Lms\V1\Rpc\StopSession\StopSessionControllerFactory::class,
            'Lms\\V1\\Rpc\\CloseUserSession\\Controller' => \Lms\V1\Rpc\CloseUserSession\CloseUserSessionControllerFactory::class,
            'Lms\\V1\\Rpc\\CalculateRakeback\\Controller' => \Lms\V1\Rpc\CalculateRakeback\CalculateRakebackControllerFactory::class,
            'Lms\\V1\\Rpc\\RevisionSession\\Controller' => \Lms\V1\Rpc\RevisionSession\RevisionSessionControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'Lms\\V1\\Rpc\\RegisterDevice\\Controller' => [
            'service_name' => 'RegisterDevice',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'lms.rpc.register-device',
        ],
        'Lms\\V1\\Rpc\\SendNotification\\Controller' => [
            'service_name' => 'SendNotification',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'lms.rpc.send-notification',
        ],
        'Lms\\V1\\Rpc\\RakebackAlgorithms\\Controller' => [
            'service_name' => 'RakebackAlgorithms',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'lms.rpc.rakeback-algorithms',
        ],
        'Lms\\V1\\Rpc\\PlaySession\\Controller' => [
            'service_name' => 'PlaySession',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'lms.rpc.play-session',
        ],
        'Lms\\V1\\Rpc\\StopSession\\Controller' => [
            'service_name' => 'StopSession',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'lms.rpc.stop-session',
        ],
        'Lms\\V1\\Rpc\\CloseUserSession\\Controller' => [
            'service_name' => 'CloseUserSession',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'lms.rpc.close-user-session',
        ],
        'Lms\\V1\\Rpc\\CalculateRakeback\\Controller' => [
            'service_name' => 'CalculateRakeback',
            'http_methods' => [
                0 => 'PATCH',
            ],
            'route_name' => 'lms.rpc.calculate-rakeback',
        ],
        'Lms\\V1\\Rpc\\RevisionSession\\Controller' => [
            'service_name' => 'RevisionSession',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'lms.rpc.revision-session',
        ],
    ],
];
