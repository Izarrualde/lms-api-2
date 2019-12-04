<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\UserSessionEntity;

class UserSessionMapper
{

    public static function sessionId(UserSessionEntity $obj)
    {
        return $obj->getSession()->getId();
    }
}
