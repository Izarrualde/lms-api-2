<?php
namespace Lms\V1\Rpc\CalculateRakeback;

use Solcre\Pokerclub\Exception\BaseException;
use Solcre\Pokerclub\Exception\SessionExceptions;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;

class CalculateRakebackController extends BaseControllerRpc
{
    public const EVENT_NAME      = 'patch';
    public const PERMISSION_NAME = 'rakeback';

    private $sessionService;
    private $permissionService;

    public function __construct(SessionService $sessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->sessionService    = $sessionService;
        $this->permissionService = $permissionService;
    }

    public function calculateRakebackAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

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
