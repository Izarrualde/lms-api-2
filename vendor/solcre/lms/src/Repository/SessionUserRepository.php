<?php

namespace Solcre\Lms\Repository;

use Solcre\SolcreFramework2\Common\BaseRepository;

class SessionUserRepository extends BaseRepository
{
    public function getHistoricalSessions(int $userId, int $count): array
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('s.title');
        $qb->addSelect('s.startAt');
        $qb->addSelect('SUM(su.points) AS points');
        $qb->from($this->_entityName, 'su');
        $qb->join('su.user', 'u');
        $qb->join('su.session', 's');
        $qb->where('u.id = :userId');
        $qb->andWhere('su.isApproved = 1');
        $qb->andWhere('s.endAt IS NOT NULL');
        $qb->groupBy('s.id');
        $qb->orderBy('s.startAt', 'DESC');
        $qb->setMaxResults($count);
        $qb->setParameter('userId', $userId);
        return $qb->getQuery()->getResult();
    }
}
