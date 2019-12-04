<?php
namespace Lms\V1\Rpc\CloseUserSession;

use Solcre\Pokerclub\Exception\BaseException;
use Solcre\Pokerclub\Exception\UserSessionExceptions;
use Solcre\Pokerclub\Service\UserSessionService;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;

class CloseUserSessionController extends BaseControllerRpc
{
    private $userSessionService;

    public function __construct(UserSessionService $userSessionService)
    {
        parent::__construct();
        $this->userSessionService = $userSessionService;
    }

    public function closeUserSessionAction()
    {
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
