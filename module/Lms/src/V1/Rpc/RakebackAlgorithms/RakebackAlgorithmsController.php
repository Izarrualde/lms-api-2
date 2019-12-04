<?php
namespace Lms\V1\Rpc\RakebackAlgorithms;

use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;
use Lms\Service\RakebackService;

class RakebackAlgorithmsController extends BaseControllerRpc
{
    private $rakebackService;

    public function __construct(RakebackService $rakebackService)
    {
        parent::__construct();
        $this->rakebackService = $rakebackService;
    }

    public function rakebackAlgorithmsAction()
    {
        return $this->rakebackService->fetchAll();
    }
}
