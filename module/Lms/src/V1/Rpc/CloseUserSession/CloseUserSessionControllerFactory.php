<?php
namespace Lms\V1\Rpc\CloseUserSession;

use Solcre\Pokerclub\Service\UserSessionService;

class CloseUserSessionControllerFactory
{
    public function __invoke($controllers)
    {
        $userSessionService = $controllers->get(UserSessionService::class);

        return new CloseUserSessionController($userSessionService);
    }
}
