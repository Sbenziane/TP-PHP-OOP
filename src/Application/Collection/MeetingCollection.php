<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Meeting;

final class MeetingCollection
{
    private $meetings;

    public function __construct(Meeting ...$meetings)
    {
        $this->meetings = $meetings;
    }

    public function getMeetings(): array
    {
        return $this->meetings;
    }
}
