<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\DealerTipSessionEntity;

class DealerTipMapper
{

    public static function sessionId(DealerTipSessionEntity $obj)
    {
        return $obj->getSession()->getId();
    }
}
