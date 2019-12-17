<?php
namespace Statistics\V1\Rpc\HoursPlayed;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class HoursPlayedControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new HoursPlayedController($sessionService, $permissionService);
    }
}
