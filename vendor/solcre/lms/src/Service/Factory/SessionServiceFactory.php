<?php

namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\SessionService;
use Zend\ServiceManager\Factory\FactoryInterface;

class SessionServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): SessionService
    {
        var_dump('expression'); die();
        $entityManager = $container->get(EntityManager::class);
        return new SessionService($entityManager);
    }
}
