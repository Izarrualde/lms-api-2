<?php
namespace Lms\V1\Rpc\RakebackAlgorithms;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;
use Zend\Mvc\Controller\AbstractActionController;
use Lms\Service\RakebackService;

class RakebackAlgorithmsController extends BaseControllerRpc
{
    public const EVENT_NAME      = 'delete';
    public const PERMISSION_NAME = 'rakeback';

    private $rakebackService;
    private $permissionService;

    public function __construct(RakebackService $rakebackService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->rakebackService   = $rakebackService;
        $this->permissionService = $permissionService;
    }

    public function rakebackAlgorithmsAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

        return $this->rakebackService->fetchAll();
    }
}
