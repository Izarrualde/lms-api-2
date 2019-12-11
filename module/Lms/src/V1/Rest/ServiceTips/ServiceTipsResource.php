<?php
namespace Lms\V1\Rest\ServiceTips;

use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class ServiceTipsResource extends BaseResource
{
    public function getPermissionName(): string
    {
        return 'tips';
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
        $serviceTips = $this->service->fetchAllPaginated(
            ["session" => $this->getUriParam("session_id")]
        );

        $arrayCollection = new PaginatedAdapter($serviceTips);

        return new ServiceTipsCollection($arrayCollection);
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
