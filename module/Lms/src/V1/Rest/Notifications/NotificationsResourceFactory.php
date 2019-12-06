<?php

namespace Lms\V1\Rest\Notifications;

use Solcre\Pokerclub\Service\NotificationService;
use Solcre\Pokerclub\Service\PermissionService;

class NotificationsResourceFactory
{
    public function __invoke($services)
    {
        $notificationService = $services->get(NotificationService::class);
        $permissionService = $services->get(PermissionService::class);
        return new NotificationsResource($notificationService, $permissionService);
    }
}
