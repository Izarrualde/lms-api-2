<?php

namespace Lms\V1\Rpc\SendNotification;

use Solcre\Lms\Service\DeviceService;
use Solcre\Lms\Service\NotificationService;
use Solcre\Lms\Service\PermissionService;
use Solcre\Lms\Service\ScheduledNotificationService;

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
