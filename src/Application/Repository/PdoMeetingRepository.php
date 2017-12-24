<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\MeetingCollection;
use Application\Entity\Meeting;
use PDO;

final class PdoMeetingRepository implements MeetingRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() : MeetingCollection
    {
        $statement = $this->database->query(
            'SELECT id as id, title as Title, description as Description, date_start as DateStart, date_end as DateEnd, community_id as communityID FROM meetings;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Meeting::class, ['', '']);
        $meetings = $statement->fetchAll();

        return new MeetingCollection(...$meetings);
    }

    public function fetchByCommunityName(string $name = '') : ?MeetingCollection
    {
        $statement = $this->database->query(
            'SELECT M.id as id, title as Title, description as Description, date_start as DateStart, date_end as DateEnd, community_id as communityID FROM meetings M, communities C WHERE M.community_id = C.id AND C.name = :name;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Meeting::class, ['', '']);
		$statement->execute([':name' => $name]);
        $meetings = $statement->fetchAll();

        return new MeetingCollection(...$meetings);
    }	
	
    public function findByName(string $title = '') : ?Meeting
    {
        $statement = $this->database->prepare(
            'SELECT id as id, title as Title, description as Description, date_start as DateStart, date_end as DateEnd, community_id as communityID FROM meetings WHERE title = :title;'
        );
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Meeting::class, ['', '']);
        $statement->execute([':title' => $title]);

        if (!$meeting = $statement->fetch()) {
            return null;
        }

        return $meeting;
    }
}
