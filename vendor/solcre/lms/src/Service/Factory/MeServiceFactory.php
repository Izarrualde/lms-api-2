<?php namespace Solcre\Lms\Service\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Solcre\Lms\Service\AwardService;
use Solcre\Lms\Service\PermissionService;
use Solcre\Lms\Service\SessionUserService;
use Solcre\Lms\Service\UserService;
use Zend\ServiceManager\Factory\FactoryInterface;
use Solcre\Lms\Service\MeService;

class MeServiceFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): MeService
    {
        $entityManager = $container->get(EntityManager::class);
        $userService = $container->get(UserService::class);
        $permissionService = $container->get(PermissionService::class);
        $awardService = $container->get(AwardService::class);
        $sessionUserService = $container->get(SessionUserService::class);
        return new MeService($entityManager, $userService, $permissionService, $awardService, $sessionUserService);
    }
}
