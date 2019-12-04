<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\BuyinSessionEntity;

class BuyinMapper
{

    public static function sessionId(BuyinSessionEntity $obj)
    {
        return $obj->getUserSession()->getSession()->getId();
    }
}
