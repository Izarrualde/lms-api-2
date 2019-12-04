<?php

namespace Lms\V1\Rest\Users;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class UsersResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'usuarios';
    }

    public function fetchAll($params = [])
    {
        $users           = $this->service->fetchAllPaginated($params);
        $arrayCollection = new PaginatedAdapter($users);
        return new UsersCollection($arrayCollection);
    }

    public function fetch($id)
    {
        return $this->service->fetch($id);
    }

    public function create($data)
    {
        // $data['logged_user_cellphone'] = $this->getLoggedUserId();
        return $this->service->add($data);
    }

    public function update($id, $data)
    {
        // $data['logged_user_cellphone'] = $this->getLoggedUserId();
        
        return $this->service->update($id, $data);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
