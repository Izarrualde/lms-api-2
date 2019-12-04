<?php

namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\UserPermissionService;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserPermissionServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): UserPermissionService
    {
        $doctrineService = $container->get(EntityManager::class);
        return new UserPermissionService($doctrineService);
    }
}
