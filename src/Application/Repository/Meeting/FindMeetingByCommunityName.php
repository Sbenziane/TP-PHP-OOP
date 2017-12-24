<?php

declare(strict_types=1);

namespace Application\Repository\Meeting;

use Application\Collection\MeetingCollection;

interface FindMeetingByCommunityName
{
    public function fetchByCommunityName() : MeetingCollection;
}
