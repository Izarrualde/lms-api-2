<?php
namespace Lms\V1\Rest\Commissions;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\CommissionSessionService;

class CommissionsResourceFactory
{
    public function __invoke($services)
    {
        $commissionSessionService = $services->get(CommissionSessionService::class);
        $permissionService        = $services->get(PermissionService::class);

        return new CommissionsResource($commissionSessionService, $permissionService);
    }
}