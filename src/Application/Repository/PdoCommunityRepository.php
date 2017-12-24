<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\CommunityCollection;
use Application\Entity\Community;
use PDO;

final class PdoCommunityRepository implements CommunityRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : CommunityCollection
    {
        $statement = $this->database->query(
            'SELECT id as id, name as Name FROM communities;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Community::class, ['', '']);
        $communities = $statement->fetchAll();

        return new CommunityCollection(...$communities);
    }

    public function findByName(string $name = '') : ?Community
    {
        $statement = $this->database->prepare(
            'SELECT id as id, name as Name FROM communities WHERE name = :name;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Community::class, ['', '']);
        $statement->execute([':name' => $name]);

        if (!$community = $statement->fetch()) {
            return null;
        }

        return $community;
    }
}
