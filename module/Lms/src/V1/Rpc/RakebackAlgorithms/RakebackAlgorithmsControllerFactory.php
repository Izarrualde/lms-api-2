<?php
namespace Lms\V1\Rpc\RakebackAlgorithms;

use Lms\Service\RakebackService;
use Solcre\Pokerclub\Service\PermissionService;

class RakebackAlgorithmsControllerFactory
{
    public function __invoke($controllers)
    {
        $rakebackService   = $controllers->get(RakebackService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new RakebackAlgorithmsController($rakebackService, $permissionService);
    }
}
