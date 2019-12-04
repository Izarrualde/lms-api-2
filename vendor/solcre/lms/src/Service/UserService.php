<?php

namespace Solcre\Lms\Service;

use Doctrine\ORM\EntityManager;
use Solcre\SolcreFramework2\Service\BaseService;
use Exception;
use \Solcre\SolcreFramework2\Utility\Strings;
use Solcre\Lms\Entity\UserEntity;
use Solcre\SolcreFramework2\Utility\File;
use Solcre\SolcreFramework2\Utility\Validators;

class UserService extends BaseService
{
    private $config;

    const AVATAR_FILE_KEY = 'avatar_file';

    public function __construct(EntityManager $entityManager, array $config)
    {
        parent::__construct($entityManager);
        $this->config = $config;
    }

    public function update($id, $data)
    {
        $user = $this->fetchBy(
            [
                'id' => $id
            ]);
        if (! $user instanceof UserEntity)
        {
            throw new Exception('User not found', 404);
        }
        $loggedUser = $this->fetchBy(
            [
                'cellphone' => $data['logged_user_cellphone']
            ]);
        if (! $loggedUser instanceof UserEntity || $loggedUser->getCellphone() !== $user->getCellphone())
        {
            throw new Exception('Method not allowed for current user', 400);
        }
        if ($this->userExists($data, $id))
        {
            throw new Exception('User already exists', 400);
        }
        if (! Validators::valid_email($data['email']))
        {
            throw new Exception('Invalid email', 400);
        }
        if ($data['avatar_file'] !== null)
        {
            $this->deleteAvatarFromServer($user);
            $avatar = $this->uploadAvatarToServer($data, true);
            $user->setAvatarVisibleFilename($avatar['name']);
            $user->setAvatarHashedFilename(File::fileNameExtract($avatar['tmp_name']));
        }
        elseif ($data['avatar_visible_filename'] === null)
        {
            $this->deleteAvatarFromServer($user);
            $user->setAvatarVisibleFilename(null);
            $user->setAvatarHashedFilename(null);
        }
        if ($data['password'] !== null)
        {
            $password = $this->checkPasswords($data['password'], $data['password_confirm']);
            $user->setPassword($this->hashPassword($password));
        }
        $user->setCellphone($data['cellphone']);
        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setLastName($data['last_name']);
        $this->entityManager->flush();
        return $user;
    }

    private function userExists($data, $id): bool
    {
        return $this->repository->userExists($data, $id);
    }

    private function checkPasswords($password, $passwordConfirm)
    {
        if ($password !== $passwordConfirm)
        {
            throw new Exception('Passwords do not match', 400);
        }
        return $password;
    }

    private function hashPassword($password)
    {
        return Strings::bcryptPassword($password);
    }

    private function uploadAvatarToServer(array $data, $isUploaded = false)
    {
        $name = $data[self::AVATAR_FILE_KEY]['name'];
        $file = File::uploadFile(
            $data,
            [
                'is_uploaded' => $isUploaded,
                'target_dir'  => $this->getPathOfAvatars(),
                'key'         => self::AVATAR_FILE_KEY,
                'hash'        => true
            ]);
        $file['name'] = $name;
        return $file;
    }

    private function deleteAvatarFromServer(UserEntity $user)
    {
        if ($user->getAvatarHashedFilename() !== null)
        {
            $fullPathOfAvatar = $this->getFullPathOfAvatar($user->getAvatarHashedFilename());
            if (file_exists($fullPathOfAvatar))
            {
                unlink($fullPathOfAvatar);
            }
        }
    }

    public function getFullPathOfAvatar($avatar): string
    {
        return $this->getPathOfAvatars() . $avatar;
    }

    private function getPathOfAvatars()
    {
        return $this->config['lms']['PATHS']['avatars'];
    }
}
