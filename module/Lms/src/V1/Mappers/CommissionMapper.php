<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\CommissionSessionEntity;

class CommissionMapper
{

    public static function sessionId(CommissionSessionEntity $obj)
    {
        return $obj->getSession()->getId();
    }
}
