<?php

namespace Lms\V1\Rpc\RegisterDevice;

use Solcre\Lms\Service\DeviceService;

class RegisterDeviceControllerFactory
{
    public function __invoke($controllers)
    {
        $service = $controllers->getServiceLocator();
        $deviceService = $service->get(DeviceService::class);
        return new RegisterDeviceController($deviceService);
    }
}
