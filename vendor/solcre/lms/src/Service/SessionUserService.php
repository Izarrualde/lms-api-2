<?php

namespace Solcre\Lms\Service;

use Solcre\Lms\Entity\UserEntity;
use Solcre\SolcreFramework2\Service\BaseService;

class SessionUserService extends BaseService
{
    public function getHistoricalSessions(UserEntity $user, int $count): array
    {
        return $this->repository->getHistoricalSessions($user->getId(), $count);
    }
}
