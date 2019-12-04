<?php
namespace Lms\V1\Rpc\PlaySession;

use Solcre\Pokerclub\Exception\SessionExceptions;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Solcre\Pokerclub\Service\SessionService;

class PlaySessionController extends BaseControllerRpc
{
    private $sessionService;

    public function __construct(SessionService $sessionService)
    {
        parent::__construct();
        $this->sessionService = $sessionService;
    }

    public function playSessionAction()
    {
        $idSession = $this->getParamFromRoute('session_id');

        try {
            return ['success' => $this->sessionService->play($idSession)];
        } catch (SessionExceptions $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        }
    }
}
