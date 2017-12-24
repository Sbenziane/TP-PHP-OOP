<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Meeting\FindMeeting;
use Application\Repository\Meeting\FindMeetingByCommunityName;
use Application\Repository\Meeting\FindAll;

interface MeetingRepository extends FindMeeting, FindMeetingByCommunityName, FindAll
{
}
