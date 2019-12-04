<?php
namespace Lms\V1\Rpc\RevisionSession;

use Solcre\Pokerclub\Service\SessionService;
use Solcre\Pokerclub\Entity\SessionEntity;
use Solcre\SolcreFramework2\Common\BaseControllerRpc;

class RevisionSessionController extends BaseControllerRpc
{
    const STATUS_CODE_400 = 400;

    private $sessionService;

    public function __construct(SessionService $sessionService)
    {
        parent::__construct();
        $this->sessionService = $sessionService;
    }

    public function revisionSessionAction()
    {

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
