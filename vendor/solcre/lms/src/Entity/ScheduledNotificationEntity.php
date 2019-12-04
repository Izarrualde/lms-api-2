<?php
namespace Solcre\Lms\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Solcre\Lms\Repository\ScheduledNotificationRepository") @ORM\Table(name="scheduled_notifications")
 */
class ScheduledNotificationEntity
{

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue * */
    protected $id;

    /**
     * @ORM\Column(type="datetime", name="created_date")
     */
    protected $createdDate;

    /**
     * @ORM\Column(type="datetime", name="sent_date")
     */
    protected $sentDate;

    /**
     * @ORM\Column(type="boolean", name="sending")
     */
    protected $sending;

    /**
     * Many scheduled notifications have a device.
     * @ORM\ManyToOne(targetEntity="Solcre\Lms\Entity\DeviceEntity")
     * @ORM\JoinColumn(name="device_id", referencedColumnName="id")
     */
    protected $device;

    /**
     * Many scheduled notifications have a notification.
     * @ORM\ManyToOne(targetEntity="Solcre\Lms\Entity\NotificationEntity")
     * @ORM\JoinColumn(name="notification_id", referencedColumnName="id")
     */
    protected $notification;

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    public function getSentDate()
    {
        return $this->sentDate;
    }

    public function getSending()
    {
        return $this->sending;
    }

    public function getDevice()
    {
        return $this->device;
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function setSentDate($sentDate)
    {
        $this->sentDate = $sentDate;
    }

    public function setSending($sending)
    {
        $this->sending = $sending;
    }

    public function setDevice($device)
    {
        $this->device = $device;
    }

    public function setNotification($notification)
    {
        $this->notification = $notification;
    }
}
