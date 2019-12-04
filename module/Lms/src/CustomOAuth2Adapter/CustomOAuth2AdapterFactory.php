<?php

namespace Lms\CustomOAuth2Adapter;

use \Doctrine\ORM\EntityManager;
use Solcre\Lms\Service\PermissionService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CustomOAuth2AdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $request = $container->get('Request');
        $entityManager     = $container->get(EntityManager::class);
        $permissionService = $container->get(PermissionService::class);
        return new CustomOAuth2Adapter($entityManager, $request, $permissionService);
    }
}