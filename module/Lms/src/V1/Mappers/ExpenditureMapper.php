<?php

namespace Lms\V1\Mappers;

use Solcre\Pokerclub\Entity\ExpensesSessionEntity;

class ExpenditureMapper
{

    public static function sessionId(ExpensesSessionEntity $obj)
    {
        return $obj->getSession()->getId();
    }
}
