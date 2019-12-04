<?php

namespace Lms\V1\Rest\Notifications;

use Exception;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;
use Solcre\SolcreFramework2\Common\BaseResource;
use ZF\ApiProblem\ApiProblem;

class NotificationsResource extends BaseResource
{
    public function getPermissionName()
    {
        return 'notificaciones';
    }

    public function create($data)
    {
        try
        {
            return $this->service->add($data);
        } catch (Exception $e)
        {
            return new ApiProblem($e->getCode(), $e->getMessage());
        }
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function fetchAll($params = [])
    {
        $notifications = $this->service->fetchAllPaginated();
        $arrayCollection = new PaginatedAdapter($notifications);
        return new NotificationsCollection($arrayCollection);
    }

    public function update($id, $data)
    {
        try
        {
            return $this->service->update($id, $data);
        } catch (Exception $e)
        {
            return new ApiProblem($e->getCode(), $e->getMessage());
        }
    }
}
