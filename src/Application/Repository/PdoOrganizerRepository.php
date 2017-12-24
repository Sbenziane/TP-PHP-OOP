<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\OrganizerCollection;
use Application\Entity\Organizer;
use PDO;

final class PdoOrganizerRepository implements OrganizerRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : OrganizerCollection
    {
        $statement = $this->database->query(
            'SELECT id as id, name as Name FROM users;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Organizer::class, ['', '']);
        $organizers = $statement->fetchAll();

        return new OrganizerCollection(...$organizers);
    }
	
    public function findByName(string $name = '') : ?Organizer
    {
        $statement = $this->database->prepare(
            'SELECT id as id, name as Name FROM users WHERE name = :name;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Organizer::class, ['', '']);
        $statement->execute([':name' => $name]);

        if (!$organizers = $statement->fetch()) {
            return null;
        }

        return $organizers;
    }
}
