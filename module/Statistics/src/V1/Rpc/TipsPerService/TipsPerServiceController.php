<?php
namespace Statistics\V1\Rpc\TipsPerService;

use Exception;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;

class TipsPerServiceController extends BaseControllerRpc
{
    public const STATUS_CODE_400 = 400;
    public const STATUS_CODE_401 = 401;
    public const EVENT_NAME      = 'fetchAll';
    public const PERMISSION_NAME = 'estadisticas';

    private $sessionService;
    private $permissionService;

    public function __construct(SessionService $sessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->sessionService    = $sessionService;
        $this->permissionService = $permissionService;
    }

    public function tipsPerServiceAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            return $this->createApiProblemResponse(self::STATUS_CODE_401, 'Method not allowed for current user');
        }

        $data = [
            'from' => $this->getParamFromBodyParams('from'),
            'to'   => $this->getParamFromBodyParams('to')
        ];

        $sessions = $this->sessionService->fetchTipsPerServiceBetweenDates($data);

        if (! is_array($sessions)) {
            return $this->createApiProblemResponse(self::STATUS_CODE_400, 'Sessions Not Found in period');
        }

        return [
            'data' => $sessions
        ];
    }
}
