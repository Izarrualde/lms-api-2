<?php
namespace Lms\V1\Rpc\RevisionSession;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;

class RevisionSessionControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService    = $controllers->get(SessionService::class);
        $permissionService = $controllers->get(PermissionService::class);

        return new RevisionSessionController($sessionService, $permissionService);
    }
}
