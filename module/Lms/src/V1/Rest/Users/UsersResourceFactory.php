<?php

namespace Lms\V1\Rest\Users;

use Solcre\Lms\Service\PermissionService;
use Solcre\Pokerclub\Service\UserService;

class UsersResourceFactory
{
    public function __invoke($services)
    {
        $userService       = $services->get(UserService::class);
        $permissionService = $services->get(PermissionService::class);

        return new UsersResource($userService, $permissionService);
    }
}
