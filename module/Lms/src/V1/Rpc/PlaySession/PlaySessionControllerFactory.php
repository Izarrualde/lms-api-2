<?php
namespace Lms\V1\Rpc\PlaySession;

use Solcre\Pokerclub\Service\SessionService;

class PlaySessionControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService = $controllers->get(SessionService::class);

        return new PlaySessionController($sessionService);
    }
}
