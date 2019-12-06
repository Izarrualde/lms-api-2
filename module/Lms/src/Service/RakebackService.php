<?php
namespace  Lms\Service;

use Doctrine\ORM\EntityManager;
use Lms\Exception\RakebackExceptions;
use Solcre\SolcreFramework2\Service\BaseService;

class RakebackService
{
    const DIR        = 'C:\xampp\htdocs\lms-api\module\Lms\src\Rakeback'; ///home/lmsuy/module/Lms/src/Rakeback
    const NAME_SPACE = 'Lms\Rakeback';

    public function fetchAll(): array
    {
        if (! is_dir(self::DIR)) {
            throw RakebackExceptions::PathIsNotDirException();
        }

        $param = self::DIR.'/*';

        $rakebackAlgorithms = glob($param);
        $algorithmsNames    = [];

        if (is_array($rakebackAlgorithms)) {
            foreach ($rakebackAlgorithms as $alg) {
                $pathParts         = pathinfo($alg);
                $algorithmsNames[] = $pathParts['filename'];
            }
        }

        $data = [
            'algorithmsNames' => $algorithmsNames,
            'namespace'       => self::NAME_SPACE
        ];

        return $data;
    }
}
