<?php

namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Solcre\Lms\Service\ScheduledNotificationService;
use Solcre\Lms\Service\DeviceService;
use Solcre\Lms\Service\NotificationService;

class ScheduledNotificationServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): ScheduledNotificationService
    {
        $entityManager = $container->get(EntityManager::class);
        $deviceService = $container->get(DeviceService::class);
        $notificationService = $container->get(NotificationService::class);
        return new ScheduledNotificationService($entityManager, $deviceService, $notificationService);
    }
}
