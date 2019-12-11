<?php
namespace Lms\V1\Rpc\PlaySession;

use Solcre\Pokerclub\Exception\SessionExceptions;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Solcre\Pokerclub\Service\SessionService;

class PlaySessionController extends BaseControllerRpc
{
    public const EVENT_NAME      = 'patch';
    public const PERMISSION_NAME = 'sesiones';

    private $sessionService;
    private $permissionService;

    public function __construct(SessionService $sessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->sessionService    = $sessionService;
        $this->permissionService = $permissionService;
    }

    public function playSessionAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

        $idSession = $this->getParamFromRoute('session_id');

        try {
            return ['success' => $this->sessionService->play($idSession)];
        } catch (SessionExceptions $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        }
    }
}
