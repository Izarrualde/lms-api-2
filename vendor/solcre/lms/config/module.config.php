<?php

use Solcre\Lms\Service\Factory\NotificationServiceFactory;
use Solcre\Lms\Service\NotificationService;

return [
    'service_manager' => [
        'factories' => [
            Solcre\Lms\Service\PermissionService::class            => Solcre\Lms\Service\Factory\PermissionServiceFactory::class,
            Solcre\Lms\Service\UserService::class                  => Solcre\Lms\Service\Factory\UserServiceFactory::class,
            Solcre\Lms\Service\UserGroupService::class             => Solcre\Lms\Service\Factory\UserGroupServiceFactory::class,
            Solcre\Lms\Service\UserGroupPermissionService::class   => Solcre\Lms\Service\Factory\UserGroupPermissionServiceFactory::class,
            Solcre\Lms\Service\UserPermissionService::class        => Solcre\Lms\Service\Factory\UserPermissionServiceFactory::class,
            Solcre\Lms\Service\MeService::class                    => Solcre\Lms\Service\Factory\MeServiceFactory::class,
            Solcre\Lms\Service\AwardService::class                 => Solcre\Lms\Service\Factory\AwardServiceFactory::class,
            Solcre\Lms\Service\SessionService::class               => Solcre\Lms\Service\Factory\SessionServiceFactory::class,
            Solcre\Lms\Service\SessionUserService::class           => Solcre\Lms\Service\Factory\SessionUserServiceFactory::class,
            Solcre\Lms\Service\DeviceService::class                => Solcre\Lms\Service\Factory\DeviceServiceFactory::class,
            Solcre\Lms\Service\NotificationService::class          => Solcre\Lms\Service\Factory\NotificationServiceFactory::class,
            Solcre\Lms\Service\ScheduledNotificationService::class => Solcre\Lms\Service\Factory\ScheduledNotificationServiceFactory::class,
        ]
    ],
    'doctrine'        => [
        'driver'       => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'my_annotation_driver'         => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    'vendor/solcre/lms/src/Entity'
                ],
            ],
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default'                  => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'Solcre\\Lms\\Entity'              => 'my_annotation_driver',
                    'Gedmo\\Translatable\\Entity'      => 'translatable_metadata_driver',
                    'Solcre\\SolcreFramework2\\Entity' => 'solcre-framework-2',
                ],
            ],
            'translatable_metadata_driver' => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    0 => 'vendor/gedmo/doctrine-extensions/lib/Gedmo/Translatable/Entity',
                ],
            ],
            'solcre-framework-2'           => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    0 => 'vendor/solcre/solcre-framework-2/src/Entity',
                ],
            ],
        ],
        'eventmanager' => [
            'orm_default' => [
                'subscribers' => [
                    0 => 'Gedmo\\Translatable\\TranslatableListener',
                ],
            ],
        ],
    ]
];
