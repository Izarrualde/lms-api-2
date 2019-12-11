<?php

namespace Lms\V1\Rest\UsersSession;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class UsersSessionResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'users_session';
    }

    public function fetchAll($params = [])
    {
        $usersSession = $this->service->fetchAllPaginated(
            ["session" => $this->getUriParam("session_id")]
        );

        $arrayCollection = new PaginatedAdapter($usersSession);
        
        return new UsersSessionCollection($arrayCollection);
    }

    public function fetch($id)
    {
        $userSession = $this->service->fetch($id);

        return $userSession;
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
