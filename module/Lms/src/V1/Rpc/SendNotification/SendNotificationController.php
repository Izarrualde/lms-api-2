<?php

namespace Lms\V1\Rpc\SendNotification;

use Exception;
use Solcre\Pokerclub\Entity\NotificationEntity;
use Solcre\Pokerclub\Service\DeviceService;
use Solcre\Pokerclub\Service\NotificationService;
use Solcre\Pokerclub\Service\PermissionService;
use Solcre\Pokerclub\Service\ScheduledNotificationService;
use Solcre\SolcreFramework2\Utility\Date;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ApiProblem\ApiProblem;
use ZF\ApiProblem\ApiProblemResponse;

class SendNotificationController extends AbstractActionController
{
    const EVENT_NAME = 'create';
    const PERMISSION_NAME = 'enviar_notificaciones';

    const PLATFORM_ID = [
        'mixed'   => 0,
        'android' => 1,
        'ios'     => 2
    ];

    private $notificationService;
    private $deviceService;
    private $scheduledNotificationService;
    private $permissionService;

    public function __construct(NotificationService $notificationService, DeviceService $deviceService, ScheduledNotificationService $scheduledNotificationService, PermissionService $permissionService
    ) {
        $this->notificationService = $notificationService;
        $this->deviceService = $deviceService;
        $this->scheduledNotificationService = $scheduledNotificationService;
        $this->permissionService = $permissionService;
    }

    public function sendNotificationAction()
    {
        try
        {
            if ($this->permissionService->checkPermission(self::EVENT_NAME, $this->getLoggedUserId(), self::PERMISSION_NAME))
            {
                $platformId = $this->params()->fromRoute('platform_id');
                $notificationId = $this->params()->fromRoute('notification_id');
                $notification = $this->notificationService->fetch($notificationId);

                $success = false;

                if ((int)$platformId === self::PLATFORM_ID['android'] || (int)$platformId === self::PLATFORM_ID['mixed'])
                {
                    //Android
                    if ($this->sendNotification($notification, self::PLATFORM_ID['android']))
                    {
                        $this->notificationService->patch(
                            $notification->getId(),
                            [
                                'androidDateSent' => Date::current()
                            ],
                            $notification);

                        $success = true;
                    }
                }

                if ((int)$platformId === self::PLATFORM_ID['ios'] || (int)$platformId === self::PLATFORM_ID['mixed'])
                {
                    //IOS
                    if ($this->sendNotification($notification, self::PLATFORM_ID['ios']))
                    {
                        $this->notificationService->patch(
                            $notification->getId(),
                            [
                                'iosDateSent' => Date::current()
                            ],
                            $notification);

                        $success = true;
                    }
                }

                return [
                    'success' => $success,
                    'date'    => date('Y-m-d H:i:s')
                ];
            }
            else
            {
                throw new Exception('Method not allowed for current user');
            }
        } catch (Exception $exc)
        {
            $code = (int)$exc->getCode() > 0 ? (int)$exc->getCode() : 400;
            return new ApiProblemResponse(new ApiProblem($code, $exc->getMessage()));
        }
    }

    private function sendNotification(NotificationEntity $notification, int $platformId): bool
    {
        $success = false;

        $devices = $this->deviceService->fetchAll(
            [
                'platform' => $platformId
            ]);

        if (! empty($devices) && is_array($devices))
        {
            foreach ($devices as $device)
            {
                $this->scheduledNotificationService->add(
                    [
                        'device_id'       => $device->getId(),
                        'notification_id' => $notification->getId()
                    ],
                    false);
            }

            $entityManager = $this->scheduledNotificationService->getEntityManager();
            $entityManager->flush();
            $success = true;
        }

        return $success;
    }

    private function getLoggedUserId()
    {
        $identity = $this->getIdentity();
        $identityData = $identity->getAuthenticationIdentity();
        return $identityData['user_id'];
    }
}
