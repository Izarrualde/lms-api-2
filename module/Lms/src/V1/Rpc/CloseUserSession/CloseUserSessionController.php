<?php
namespace Lms\V1\Rpc\CloseUserSession;

use Solcre\Pokerclub\Exception\BaseException;
use Solcre\Pokerclub\Exception\UserSessionExceptions;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\UserSessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;

class CloseUserSessionController extends BaseControllerRpc
{
    public const EVENT_NAME      = 'patch';
    public const PERMISSION_NAME = 'users_session';

    private $userSessionService;
    private $permissionService;

    public function __construct(UserSessionService $userSessionService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->userSessionService = $userSessionService;
        $this->permissionService  = $permissionService;
    }

    public function closeUserSessionAction()
    {
        if (! $this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME)) {
            throw new Exception('Method not allowed for current user');
        }

        $data = [
            'id'      => $this->getParamFromBodyParams('id'),
            'idUser'  => $this->getParamFromBodyParams('idUser'),
            'cashout' => $this->getParamFromBodyParams('cashout'),
            'end'     => $this->getParamFromBodyParams('end')
        ];

        try {
            return ['success' => $this->userSessionService->close($data)];
        } catch (UserSessionExceptions $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        } catch (BaseException $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        } catch (\Exception $e) {
            return $this->createApiProblemResponse($e->getCode(), $e->getMessage());
        }
    }
}
