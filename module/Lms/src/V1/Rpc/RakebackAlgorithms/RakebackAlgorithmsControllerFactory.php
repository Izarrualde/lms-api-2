<?php
namespace Lms\V1\Rpc\RakebackAlgorithms;

use Lms\Service\RakebackService;

class RakebackAlgorithmsControllerFactory
{
    public function __invoke($controllers)
    {
        $rakebackService = $controllers->get(RakebackService::class);

        return new RakebackAlgorithmsController($rakebackService);
    }
}
