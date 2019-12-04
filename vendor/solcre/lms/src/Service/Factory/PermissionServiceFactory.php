<?php
namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\PermissionService;
use Zend\ServiceManager\Factory\FactoryInterface;

class PermissionServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): PermissionService
    {
        $doctrineService = $container->get(EntityManager::class);
        return new PermissionService($doctrineService);
    }
}
