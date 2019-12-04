<?php

namespace Solcre\Lms\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="permisos_grupos")
 */
class UserGroupPermissionEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="d")
     */
    protected $delete;

    /**
     * @ORM\Column(type="integer", name="r")
     */
    protected $read;

    /**
     * @ORM\Column(type="integer", name="w")
     */
    protected $write;

    /**
     * @ORM\ManyToOne(targetEntity="Solcre\Lms\Entity\UserGroupEntity")
     * @ORM\JoinColumn(name="id_grupo", referencedColumnName="id")
     */
    protected $userGroup;

    /**
     * @ORM\ManyToOne(targetEntity="Solcre\Lms\Entity\PermissionEntity")
     * @ORM\JoinColumn(name="id_permiso", referencedColumnName="id")
     */
    protected $permission;

    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param integer $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of userGroup.
     *
     * @return integer
     */
    public function getUserGroup()
    {
        return $this->userGroup->getId();
    }

    /**
     * Sets the value of userGroup.
     *
     * @param UserGroupEntity $userGroup the user group
     *
     * @return self
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;
    }

    /**
     * Gets the value of delete.
     *
     * @return string
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * Sets the value of delete.
     *
     * @param string $delete the delete
     *
     * @return self
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
    }

    /**
     * Gets the value of read.
     *
     * @return string
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * Sets the value of read.
     *
     * @param string $read the read
     *
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * Gets the value of write.
     *
     */
    public function getWrite()
    {
        return $this->write;
    }

    /**
     * Sets the value of write.
     *
     * @param string $write the write
     *
     */
    public function setWrite($write)
    {
        $this->write = $write;
    }

    /**
     * Gets the value of permission.
     *
     * @return string
     */
    public function getPermission()
    {
        return $this->permission->getId();
    }

    /**
     * Sets the value of permission.
     *
     * @param string $permission the permission
     *
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }
}
