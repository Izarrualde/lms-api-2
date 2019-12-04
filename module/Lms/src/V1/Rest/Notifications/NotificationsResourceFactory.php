<?php

namespace Lms\V1\Rest\Notifications;

use Solcre\Lms\Service\NotificationService;
use Solcre\Lms\Service\PermissionService;

class NotificationsResourceFactory
{
    public function __invoke($services)
    {
        $notificationService = $services->get(NotificationService::class);
        $permissionService = $services->get(PermissionService::class);
        return new NotificationsResource($notificationService, $permissionService);
    }
}
