<?php

namespace Lms\V1\Rest\Buyins;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class BuyinsResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'buyins';
    }

    public function fetchAll($params = [])
    {
        // $arrayCollection = new PaginatedAdapter($buyins);

        return $this->service->fetchAllBuyins($this->getUriParam("session_id"));
    }

    public function fetch($id)
    {
        return $this->service->fetch($id);
    }

    public function create($data)
    {
        $data['logged_user_cellphone'] = $this->getLoggedUserId();
        return $this->service->add($data);
    }

    public function update($id, $data)
    {
        $data['logged_user_cellphone'] = $this->getLoggedUserId();
        
        return $this->service->update($id, $data);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
