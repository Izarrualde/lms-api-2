<?php
namespace Lms\V1\Rest\Sessions;

use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\UserService;
use Solcre\SolcreFramework2\Common\BaseResource;
use Solcre\SolcreFramework2\Service\BaseService;
use ZF\ApiProblem\ApiProblem;
use Solcre\SolcreFramework2\Adapter\PaginatedAdapter;

class SessionsResource extends BaseResource
{
    public const        PAST_SESSIONS      = 'sesiones_pasadas';
    public const        SESSIONS           = 'sesiones';
    public const        MY_SESSIONS        = 'mis_sesiones';
    public const        NUMBER_OF_SESSIONS = 5;

    public function getPermissionName(): string
    {
        return self::MY_SESSIONS;
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

    private function fetchMySessions()
    {
        $idUser = $this->getLoggedUserId();

        return $this->service->fetchMySessions($idUser, self::NUMBER_OF_SESSIONS);
    }

    private function selectPermissionAndFetch($params)
    {
        if ($this->checkPermission($this->event, self::PAST_SESSIONS , false)) {
            var_dump('soy admin');
            return $this->service->fetchAllPaginated($params);
        }

        if ($this->checkPermission($this->event, self::SESSIONS , false)) {
            var_dump('soy encargado');
            $params['endTime'] = null;

            return $this->service->fetchAllPaginated($params);
        }

        if ($this->checkPermission($this->event, self::MY_SESSIONS , false)) {
            var_dump('soy player');

            return $this->fetchMySessions();
        }
    }

    public function fetchAll($params = [])
    {
        $sessions = $this->selectPermissionAndFetch($params);
        die();
        $arrayCollection = new PaginatedAdapter($sessions);

        return new SessionsCollection($arrayCollection);
    }

    public function update($id, $data)
    {
        $data['logged_user_cellphone'] = $this->getLoggedUserId();
        return $this->service->update($id, $data);
    }
}
