<?php
namespace Statistics\V1\Rpc\DealerTips;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class DealerTipsControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new DealerTipsController($sessionService, $permissionService);
    }
}
