<?php

namespace Solcre\Lms\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Solcre\SolcreFramework2\Common\BaseRepository") @ORM\Table(name="sessions")
 */
class SessionEntity
{

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue * */
    protected $id;

    /** @ORM\Column(type="datetime", name="created_at") * */
    protected $createdAt;

    /** @ORM\Column(type="string") * */
    protected $title;

    /** @ORM\Column(type="text") * */
    protected $description;

    /** @ORM\Column(type="smallint", name="count_of_seats") * */
    protected $countOfSeats;

    /** @ORM\Column(type="datetime", name="start_at") * */
    protected $startAt;

    /** @ORM\Column(type="datetime", name="real_start_at", nullable=true) * */
    protected $realStartAt;

    /** @ORM\Column(type="datetime", name="end_at", nullable=true) * */
    protected $endAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCountOfSeats()
    {
        return $this->countOfSeats;
    }

    /**
     * @param mixed $countOfSeats
     */
    public function setCountOfSeats($countOfSeats)
    {
        $this->countOfSeats = $countOfSeats;
    }

    /**
     * @return mixed
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * @param mixed $startAt
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * @return mixed
     */
    public function getRealStartAt()
    {
        return $this->realStartAt;
    }

    /**
     * @param mixed $realStartAt
     */
    public function setRealStartAt($realStartAt)
    {
        $this->realStartAt = $realStartAt;
    }

    /**
     * @return mixed
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param mixed $endAt
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
    }
}
