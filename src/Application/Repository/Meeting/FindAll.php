<?php

declare(strict_types=1);

namespace Application\Repository\Meeting;

use Application\Collection\MeetingCollection;

interface FindAll
{
    public function fetchAll() : MeetingCollection;
}
