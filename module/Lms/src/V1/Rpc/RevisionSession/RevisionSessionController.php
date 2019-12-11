<?php
namespace Lms\V1\Rpc\RevisionSession;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\Pokerclub\Entity\SessionEntity;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;

class RevisionSessionController extends BaseControllerRpc
{
    public const STATUS_CODE_400 = 400;
    public const EVENT_NAME      = 'delete';
    public const PERMISSION_NAME = 'sesiones';

    private $sessionService;
    private $permissionService;

    public function __construct(SessionService $sessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->sessionService    = $sessionService;
        $this->permissionService = $permissionService;
    }

    public function revisionSessionAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

        $idSession = $this->getParamFromRoute('session_id');

        $session = $this->sessionService->fetch($idSession);

        if (! $session instanceof SessionEntity) {
            return $this->createApiProblemResponse(self::STATUS_CODE_400, 'Session Not Found');
        };

        return [
            'valid'           => $session->getValid(),
            'totalPlayed'     => $session->getTotalPlayed(),
            'totalCashout'    => $session->getTotalCashout(),
            'commissionTotal' => $session->getCommissionTotal(),
            'dealerTipTotal'  => $session->getDealerTipTotal(),
            'serviceTipTotal' => $session->getServiceTipTotal()
        ];
    }
}
