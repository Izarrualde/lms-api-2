<?php
namespace Lms\V1\Rest\ServiceTips;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\ServiceTipSessionService;

class ServiceTipsResourceFactory
{
    public function __invoke($services)
    {
        $serviceTipSessionService = $services->get(ServiceTipSessionService::class);
        $permissionService = $services->get(PermissionService::class);

        return new ServiceTipsResource($serviceTipSessionService, $permissionService);
    }
}
