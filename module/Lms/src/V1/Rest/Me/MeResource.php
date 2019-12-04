<?php

namespace Lms\V1\Rest\Me;

use Solcre\SolcreFramework2\Common\BaseResource;

class MeResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return '';
    }

    public function fetchAll($params = [])
    {
        return $this->service->fetchAll(
            [
                'cellphone' => $this->getLoggedUserId()
            ]);
    }
}
