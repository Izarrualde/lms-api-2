<?php
namespace Statistics\V1\Rpc\RakeRace;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class RakeRaceControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new RakeRaceController($sessionService, $permissionService);
    }
}
