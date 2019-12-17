<?php
namespace Statistics\V1\Rpc\TipsPerService;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class TipsPerServiceControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new TipsPerServiceController($sessionService, $permissionService);
    }
}
