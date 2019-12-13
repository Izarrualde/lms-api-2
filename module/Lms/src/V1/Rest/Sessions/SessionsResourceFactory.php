<?php
namespace Lms\V1\Rest\Sessions;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\Pokerclub\Service\UserService;

class SessionsResourceFactory
{
    public function __invoke($services)
    {
        $sessionService    = $services->get(SessionService::class);
        $permissionService = $services->get(PermissionService::class);

        return new SessionsResource($sessionService, $permissionService);
    }
}
