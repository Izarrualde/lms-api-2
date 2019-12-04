<?php
namespace Lms\Rakeback;

use Solcre\Pokerclub\Entity\UserSessionEntity;
use Solcre\Pokerclub\Rakeback\RakebackAlgorithm;

class GrossEarningsRakeback implements RakebackAlgorithm
{
    const RAKEBACK_PERCENTAGE = 0.01;

    public function calculate(UserSessionEntity $userSession)
    {
        return ($userSession->getSession()->getCommissionTotal()
        - $userSession->getSession()->getExpensesTotal())
        * self::RAKEBACK_PERCENTAGE;
    }
}
