<?php

namespace Lms\V1\Rpc\RegisterDevice;

use Solcre\Pokerclu\Entity\DeviceEntity;
use Solcre\Pokerclub\Service\DeviceService;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ApiProblem\ApiProblem;
use ZF\ApiProblem\ApiProblemResponse;

class RegisterDeviceController extends AbstractActionController
{
    protected $deviceService;

    /**
     * RegisterDeviceController constructor.
     * @param $deviceService
     */
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function registerDeviceAction()
    {
        /* @var $device DeviceEntity */
        $device = $this->deviceService->getDevice($this->bodyParams(), $this->getLoggedUserId());
        if ($device instanceof DeviceEntity)
        {
            return [
                'id'          => $device->getId(),
                'deviceToken' => $device->getDeviceToken(),
                'platform'    => $device->getPlatform(),
                'addedDate'   => $device->getAddedDate(),
                'user'        => $device->getUser()
            ];
        }
        else
        {
            return new ApiProblemResponse(new ApiProblem(400, 'Error al generar el token'));
        }
    }

    private function getLoggedUserId()
    {
        $identity = $this->getIdentity();
        $identityData = $identity->getAuthenticationIdentity();
        return $identityData['user_id'];
    }
}
