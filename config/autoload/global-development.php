<?php

/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

use ZF\Apigility\Admin\Model\ModulePathSpec;

return [
    'view_manager'       => [
        'display_exceptions' => true,
    ],
    'zf-apigility-admin' => [
        'path_spec' => ModulePathSpec::PSR_4,
    ],
    'zf-configuration'   => [
        'enable_short_array' => true,
        'class_name_scalars' => true,
    ],
    'router'             => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'route' => '/oauth'
                ],
            ],
        ],
    ],
    'zf-oauth2'          => [
        'storage'          => 'ZF\OAuth2\Adapter\PdoAdapter',
        'db'               => [
            'dsn'      => 'mysql:dbname=lms_db;host=localhost',
            'route'    => '/oauth',
            'username' => 'root',
            'password' => ''
        ],
        'storage_settings' => [
            'user_table' => 'users',
        ],
        'allow_implicit'   => true,
        'access_lifetime'  => 14400,
        'options'          => [
            'unset_refresh_token_after_use' => false
        ]
    ],
    'doctrine'           => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params'      => [
                    'host'          => 'localhost',
                    'port'          => '3306',
                    'user'          => 'root',
                    'password'      => '',
                    'dbname'        => 'lms_db',
                    'charset'       => 'utf8',
                    'driverOptions' => [
                        1002 => 'SET NAMES utf8',
                    ],
                ],
            ],
        ],
    ],
    'zf-mvc-auth'        => [
        'authentication' => [
            'adapters' => [
                'CustomOAuth2Adapter' => [
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => [
                        'storage'  => Lms\CustomOAuth2Adapter\CustomOAuth2Adapter::class,
                        'route'    => '/oauth',
                        'dsn'      => 'mysql:dbname=lms_db;host=localhost',
                        'username' => 'root',
                        'password' => ''
                    ],
                ],
            ],
        ],
    ],
    'lms'                => [
        'PATHS'              => [
            'avatars' => __DIR__ . '/../../public_html/uploads/avatars/',
        ],
        'PUSH_NOTIFICATIONS' => [
            'ANDROID' => [
                'TOKEN' => 'AAAA1mNEEKw:APA91bHSMa_i0CITGeUHdv-ckkubSSBYfovMMBAiBO9WL9wZ4h79sMWEbjwMFPNNnTMdVa8mDcBB_bIC48-fEe_7R2nUQYxKKt2Sk-6ETBuivW-nEjfJTW0rvkh0syeF4xp71y6PE_SS'
            ],
            'IOS'     => [
                'PEM' => __DIR__ . '/../../data/notifications/ios/',
            ],
            'TYPES'   => [
                'NOTIFICATION_TYPE_GENERAL' => 'GENERAL'
            ]
        ]
    ]
];
