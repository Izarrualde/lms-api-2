<?php
namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\DeviceService;
use Solcre\Lms\Service\NotificationService;
use Solcre\Lms\Service\UserService;
use Zend\ServiceManager\Factory\FactoryInterface;

class NotificationServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): NotificationService
    {
        $doctrineService = $container->get(EntityManager::class);
        $userService = $container->get(UserService::class);
        $deviceService = $container->get(DeviceService::class);
        $config = $container->get('config');
        return new NotificationService($doctrineService, $userService, $deviceService, $config);
    }
}
