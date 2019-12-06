<?php

namespace Lms\V1\Rest\UsersSession;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\UserSessionService;

class UsersSessionResourceFactory
{
    public function __invoke($services)
    {
        $userSessionService = $services->get(UserSessionService::class);
        $permissionService  = $services->get(PermissionService::class);

        return new UsersSessionResource($userSessionService, $permissionService);
    }
}