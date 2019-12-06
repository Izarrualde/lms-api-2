<?php

namespace Lms\CustomOAuth2Adapter;

use PDO;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use PDOStatement;
use Solcre\Pokerclub\Service\PermissionService;
use ZF\OAuth2\Adapter\PdoAdapter;
use ZF\ContentNegotiation\Request;

class CustomOAuth2Adapter extends PdoAdapter
{
    private $request;
    private $permissionService;

    const USER_TABLE = 'users';

    public function __construct(EntityManager $entityManager, Request $request, PermissionService $permissionService)
    {
        $connection = $entityManager->getConnection();
        $dsn = $this->getDsn($connection);
        $username = $this->getUsername($connection);
        $password = $this->getPassword($connection);
        $pdo = new Pdo($dsn, $username, $password);

        $config = [
            'user_table' => 'users'
        ];

        parent::__construct($pdo, $config);
        $this->permissionService = $permissionService;
        $this->request = $request;
    }

    private function getUsername(Connection $connection): string
    {
        return $connection->getUsername();
    }

    private function getPassword(Connection $connection): string
    {
        return $connection->getPassword();
    }

    private function getDsn(Connection $connection): string
    {
        return 'mysql:dbname=' . $connection->getDatabase() . ';host=' . $connection->getHost();
    }

    private function getClientId(): string
    {
        if (empty($this->request->getContent()))
        {
            $clientId = $this->request->getPost('client_id');
        }
        else
        {
            $clientId = json_decode($this->request->getContent(), true)['client_id'];
        }

        return $clientId;
    }

    private function hasManagerClientId(): bool
    {
        return $this->getClientId() === 'manager';
    }

    private function hasManagerLogInPermission(string $username): bool
    {
        return $this->permissionService->checkPermission('create', $username, 'manager_log_in');
    }

    public function getUser($username)
    {
        if ($this->hasManagerClientId() && ! $this->hasManagerLogInPermission($username))
        {
            return false;
        }
        $stmt = $this->db->prepare(sprintf($this->getUserOauthSql(), self::USER_TABLE));
        if ($stmt instanceof PDOStatement)
        {
            $stmt->execute(['username' => $username]);
            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($userInfo)
            {
                return array_merge(
                    [
                        'user_id' => $userInfo['username']
                    ],
                    $userInfo);
            }
        }
        return false;
    }

    private function getUserOauthSql(): string
    {
        return 'SELECT * from %s where username=:username AND is_active = 1';
    }
}