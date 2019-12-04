<?php

namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\SessionUserService;
use Zend\ServiceManager\Factory\FactoryInterface;

class SessionUserServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): SessionUserService
    {
        $entityManager = $container->get(EntityManager::class);
        return new SessionUserService($entityManager);
    }
}
