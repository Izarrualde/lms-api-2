<?php
namespace Lms\V1\Rest\Awards;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\AwardService;

class AwardsResourceFactory
{
    public function __invoke($services)
    {
        $awardService      = $services->get(AwardService::class);
        $permissionService = $services->get(PermissionService::class);

        return new AwardsResource($awardService, $permissionService);
    }
}
