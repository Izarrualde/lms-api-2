<?php
namespace Statistics\V1\Rpc\TipsPerDealer;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class TipsPerDealerControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new TipsPerDealerController($sessionService, $permissionService);
    }
}
