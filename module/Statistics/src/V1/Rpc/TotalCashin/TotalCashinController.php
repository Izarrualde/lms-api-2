<?php
namespace Statistics\V1\Rpc\TotalCashin;

use Exception;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\SessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;

class TotalCashinController extends BaseControllerRpc
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

    public function totalCashinAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            return $this->createApiProblemResponse(self::STATUS_CODE_401, 'Method not allowed for current user');
        }

        $data = [
            'from' => $this->getParamFromBodyParams('from'),
            'to'   => $this->getParamFromBodyParams('to')
        ];

        $result = $this->sessionService->fetchTotalCashinBySession($data);

        if (! is_array($result)) {
            return $this->createApiProblemResponse(self::STATUS_CODE_400, 'Sessions Not Found in period');
        }

        return [
            'data' => $result
        ];
    }
}
