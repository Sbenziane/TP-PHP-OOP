<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\UserCollection;
use Application\Entity\User;
use PDO;

final class PdoUserRepository implements UserRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : UserCollection
    {
        $statement = $this->database->query(
            'SELECT id as id, name as Name FROM users;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, User::class, ['', '']);
        $users = $statement->fetchAll();

        return new UserCollection(...$users);
    }
	
    public function findByName(string $name = '') : ?User
    {
        $statement = $this->database->prepare(
            'SELECT id as id, name as Name FROM users WHERE name = :name;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, User::class, ['', '']);
        $statement->execute([':name' => $name]);

        if (!$user = $statement->fetch()) {
            return null;
        }

        return $user;
    }
}
