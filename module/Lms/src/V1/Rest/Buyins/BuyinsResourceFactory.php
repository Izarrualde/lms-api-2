<?php

namespace Lms\V1\Rest\Buyins;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\BuyinSessionService;

class BuyinsResourceFactory
{
    public function __invoke($services)
    {
        $buyinSessionService = $services->get(BuyinSessionService::class);
        $permissionService   = $services->get(PermissionService::class);

        return new BuyinsResource($buyinSessionService, $permissionService);
    }
}