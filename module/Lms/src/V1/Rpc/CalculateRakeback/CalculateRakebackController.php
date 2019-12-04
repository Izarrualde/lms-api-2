<?php
namespace Lms\V1\Rpc\CalculateRakeback;

use Solcre\Pokerclub\Exception\BaseException;
use Solcre\Pokerclub\Exception\SessionExceptions;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;

class CalculateRakebackController extends BaseControllerRpc
{
    private $sessionService;

    public function __construct(SessionService $sessionService)
    {
        parent::__construct();
        $this->sessionService = $sessionService;
    }

    public function calculateRakebackAction()
    {
        $idSession = $this->getParamFromRoute('session_id');

        try {
            return ['success' => $this->sessionService->calculateRakeback($idSession)];
        } catch (SessionExceptions $e) {
           return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        } catch (BaseException $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        } catch (\Exception $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        }
    }
}
