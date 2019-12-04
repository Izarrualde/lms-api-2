<?php
namespace Lms\V1\Rest\Commissions;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class CommissionsResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'usuarios';
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
        return $this->service->fetch($id);
    }

    public function fetchAll($params = [])
    {
        $commissions      = $this->service->fetchAllPaginated(
            ["session" => $this->getUriParam("session_id")]
        );

        $arrayCollection = new PaginatedAdapter($commissions);

        return new CommissionsCollection($arrayCollection);
    }

    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    public function update($id, $data)
    {
        return $this->service->update($id, $data);
    }
}
