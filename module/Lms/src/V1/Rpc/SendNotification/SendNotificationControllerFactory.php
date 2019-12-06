<?php

namespace Lms\V1\Rpc\SendNotification;

use Solcre\Pokerclub\Service\DeviceService;
use Solcre\Pokerclub\Service\NotificationService;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\ScheduledNotificationService;

class SendNotificationControllerFactory
{
    public function __invoke($controllers)
    {
        $service = $controllers->getServiceLocator();
        $notificationService = $service->get(NotificationService::class);
        $deviceService = $service->get(DeviceService::class);
        $scheduledNotificationService = $service->get(ScheduledNotificationService::class);
        $permissionService = $service->get(PermissionService::class);
        return new SendNotificationController($notificationService, $deviceService, $scheduledNotificationService, $permissionService);
    }
}
