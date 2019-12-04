<?php
namespace Lms\V1\Rpc\CalculateRakeback;

use Solcre\Pokerclub\Service\SessionService;

class CalculateRakebackControllerFactory
{
    public function __invoke($controllers)
    {
        $sessionService = $controllers->get(SessionService::class);

        return new CalculateRakebackController($sessionService);
    }
}
