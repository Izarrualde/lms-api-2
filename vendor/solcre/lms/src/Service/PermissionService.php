<?php

namespace Solcre\Lms\Service;

use Solcre\SolcreFramework2\Service\BaseService;
use Solcre\Lms\Entity\PermissionEntity;

class PermissionService extends BaseService
{

    private static $permissionsEvents = array(
        'r' => ['fetch', 'fetchAll'],
        'w' => ['create', 'patch', 'update', 'replaceList'],
        'd' => ['delete']
    );

    public function add($data)
    {
        try {
            if ($this->checkPermissionExists($data['name'])) {
                return parent::add($data);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function checkPermissionExists($name, $id = null)
    {
        $permission = $this->repository->checkPermissionExists($name, $id);
        if ($permission instanceof PermissionEntity) {
            throw new \Exception('Permission already exists', 400);
        } else {
            return true;
        }
    }


    public function update($id, $data)
    {
        try {
            if ($this->checkPermissionExists($data['name'], $data['id'])) {
                $permission = $this->fetch($id);
                $permission->setName($data['name']);
                $permission->setDescription($data['description']);
                $this->entityManager->flush();
                return $permission;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function checkPermission($eventName, $userEmail, $permissionName)
    {
        if (empty($permissionName)) {
            return true;
        }
        $result = false;
        $permissions = $this->repository->getPermissionsByUser($userEmail);
        if (is_array($permissions) && count($permissions)) {
            //Normalize without permission name (all)
            $permissions = $this->normalizePermissions($permissions);
            $action = $this->checkEvent($eventName);

            //Get with the permission name the bd results
            //Calculate
            if (empty($permissions[$permissionName])) {
                return false;
            }
            $calculated[$permissionName] = $this->calculatePermissions($permissions[$permissionName]);

            //Check permission action and set $result
            if ($calculated[$permissionName][$action] > 0) {
                $result = true;
            }
        }
        return $result;
    }

    public function checkEvent($eventName)
    {
        if (in_array($eventName, self::$permissionsEvents['r'])) {
            return 'r';
        } else {
            if (in_array($eventName, self::$permissionsEvents['w'])) {
                return 'w';
            } else {
                if (in_array($eventName, self::$permissionsEvents['d'])) {
                    return 'd';
                }
            }
        }
    }

    public function normalizePermissions($permissions)
    {
        $result = [];
        foreach ($permissions as $permission) {
            if (!array_key_exists($permission['nombre'], $result)) {
                $result[$permission['nombre']] = array(
                    'd' => array(),
                    'r' => array(),
                    'w' => array(),
                );
            }

            $result[$permission['nombre']]['d'][] = $permission['d'];
            $result[$permission['nombre']]['r'][] = $permission['r'];
            $result[$permission['nombre']]['w'][] = $permission['w'];
        }

        return $result;
    }

    public function calculatePermissions($permissions)
    {
        return array(
            'd' => $this->sumPermissions($permissions['d']),
            'r' => $this->sumPermissions($permissions['r']),
            'w' => $this->sumPermissions($permissions['w'])
        );
    }

    public function sumPermissions($array)
    {
        return in_array(-1, $array) ? -1 : ((array_sum($array) > 0) ? 1 : 0);
    }

    public function getAllPermissions($cellphone)
    {
        $permissions = $this->repository->getPermissionsByUser($cellphone);
        $calculated = [];
        if (is_array($permissions) && count($permissions)) {
            //Normalize without permission name (all)
            $permissions = $this->normalizePermissions($permissions);
            //Foreach and calculate
            foreach ($permissions as $name => $permission) {
                $calculated[$name] = $this->calculatePermissions($permission);
            }
        }
        return $calculated;
    }

}
