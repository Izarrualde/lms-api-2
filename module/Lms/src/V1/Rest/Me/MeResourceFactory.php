<?php

namespace Lms\V1\Rest\Me;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\MeService;

class MeResourceFactory
{
    public function __invoke($services)
    {
        $meService = $services->get(MeService::class);

        $permissionService = $services->get(PermissionService::class);

        return new MeResource($meService, $permissionService);
    }
}
