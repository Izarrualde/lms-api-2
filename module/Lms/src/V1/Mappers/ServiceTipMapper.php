<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\ServiceTipSessionEntity;

class ServiceTipMapper
{

    public static function sessionId(ServiceTipSessionEntity $obj)
    {
        return $obj->getSession()->getId();
    }
}
