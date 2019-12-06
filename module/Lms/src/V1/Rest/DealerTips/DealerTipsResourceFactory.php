<?php
namespace Lms\V1\Rest\DealerTips;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\DealerTipSessionService;

class DealerTipsResourceFactory
{
    public function __invoke($services)
    {
        $dealerTipSessionService = $services->get(DealerTipSessionService::class);
        $permissionService = $services->get(PermissionService::class);

        return new DealerTipsResource($dealerTipSessionService, $permissionService);
    }
}
