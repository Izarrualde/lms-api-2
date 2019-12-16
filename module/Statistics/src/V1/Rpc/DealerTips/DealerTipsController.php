<?php
namespace Statistics\V1\Rpc\DealerTips;

use Exception;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;

class DealerTipsController extends BaseControllerRpc
{
    public const STATUS_CODE_400 = 400;
    public const EVENT_NAME      = 'fetchAll';
    public const PERMISSION_NAME = 'mis_sesiones';

    private $sessionService;
    private $permissionService;

    public function __construct(SessionService $sessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->sessionService    = $sessionService;
        $this->permissionService = $permissionService;
    }

    public function dealerTipsAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

        $data = [
            'from' => $this->getParamFromBodyParams('from'),
            'to'   => $this->getParamFromBodyParams('to')
        ];

        $sessions = $this->sessionService->fetchDealerTipsBetweenDates($data);

        if (! is_array($sessions)) {
            return $this->createApiProblemResponse(self::STATUS_CODE_400, 'Sessions Not Found in period');
        }

        return $sessions;
    }


}
