<?php
namespace Lms\V1\Rest\Sessions;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class SessionsResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'sesiones';
    }

    public function create($data)
    {
        $data['logged_user_cellphone'] = $this->getLoggedUserId();
        return $this->service->add($data);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function fetch($id)
    {
        $session = $this->service->fetch($id);

        return $session;
    }

    public function fetchAll($params = [])
    {
        $sessions = $this->service->fetchAllPaginated($params);
        $arrayCollection = new PaginatedAdapter($sessions);
        
        return new SessionsCollection($arrayCollection);
    }

    public function update($id, $data)
    {
        $data['logged_user_cellphone'] = $this->getLoggedUserId();
        return $this->service->update($id, $data);
    }
}
