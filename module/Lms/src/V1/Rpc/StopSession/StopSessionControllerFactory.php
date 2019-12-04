<?php
namespace Lms\V1\Rpc\StopSession;

use Solcre\Pokerclub\Service\SessionService;


class StopSessionControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService = $controllers->get(SessionService::class);

        return new StopSessionController($sessionService);
    }
}
