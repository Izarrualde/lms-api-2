<?php
namespace Statistics\V1\Rpc\ServiceTips;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class ServiceTipsControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new ServiceTipsController($sessionService, $permissionService);
    }
}
