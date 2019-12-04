<?php

namespace Solcre\Lms\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Solcre\Lms\Repository\UserRepository") @ORM\Table(name="users")
 */
class UserEntity
{

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue * */
    protected $id;

    /** @ORM\Column(type="datetime", name="created_date") * */
    protected $createdDate;

    /** @ORM\Column(type="string", name="username") * */
    protected $cellphone;

    /** @ORM\Column(type="string") * */
    protected $password;

    /** @ORM\Column(type="string") * */
    protected $name;

    /** @ORM\Column(type="string", name="last_name") * */
    protected $lastName;

    /** @ORM\Column(type="string") * */
    protected $email;

    /** @ORM\Column(type="integer") * */
    protected $hours;

    /** @ORM\Column(type="integer") * */
    protected $sessions;

    /** @ORM\Column(type="integer") * */
    protected $points;

    /** @ORM\Column(type="string", name="avatar_hashed_filename") * */
    protected $avatarHashedFilename;

    /** @ORM\Column(type="string", name="avatar_visible_filename") * */
    protected $avatarVisibleFilename;

    /**
     * @ORM\ManyToMany(targetEntity="Solcre\Lms\Entity\AwardEntity", indexBy="id")
     * @ORM\JoinTable(name="users_awards",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="award_id", referencedColumnName="id")}
     *      )
     */
    protected $awards;

    /**
     * @ORM\ManyToMany(targetEntity="Solcre\Lms\Entity\UserGroupEntity", indexBy="id")
     * @ORM\JoinTable(name="usuarios_pertenece",
     *      joinColumns={@ORM\JoinColumn(name="id_usuario", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_grupo", referencedColumnName="id")}
     *      )
     */
    protected $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

    public function addGroups($groups)
    {
        foreach ($groups as $group)
        {
            if (! $this->groups->contains($group))
            {
                $this->groups->add($group);
            }
        }
    }

    public function removeGroups()
    {
        $groups = $this->getGroups();
        foreach ($groups as $group)
        {
            $this->groups->removeElement($group);
        }
    }

    public function setGroups($groups)
    {
        foreach ($this->groups as $id => $group)
        {

            if (! isset($groups[$id]))
            {
                /* Remove from old because it doesn't exist in new */
                $this->groups->remove($id);
            }
            else
            {
                /* The group already exists do not overwrite */
                unset($groups[$id]);
            }
        }
        /* Add groups that exist in new but not in old */
        foreach ($groups as $id => $group)
        {
            $this->groups[$id] = $group;
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

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
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * @param mixed $cellphone
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * @param mixed $sessions
     */
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getAvatarHashedFilename()
    {
        return $this->avatarHashedFilename;
    }

    /**
     * @param mixed $avatarHashedFilename
     */
    public function setAvatarHashedFilename($avatarHashedFilename)
    {
        $this->avatarHashedFilename = $avatarHashedFilename;
    }

    /**
     * @return mixed
     */
    public function getAvatarVisibleFilename()
    {
        return $this->avatarVisibleFilename;
    }

    /**
     * @param mixed $avatarVisibleFilename
     */
    public function setAvatarVisibleFilename($avatarVisibleFilename)
    {
        $this->avatarVisibleFilename = $avatarVisibleFilename;
    }

    /**
     * @return mixed
     */
    public function getAwards()
    {
        return $this->awards;
    }

    /**
     * @param mixed $awards
     */
    public function setAwards($awards)
    {
        $this->awards = $awards;
    }
}
