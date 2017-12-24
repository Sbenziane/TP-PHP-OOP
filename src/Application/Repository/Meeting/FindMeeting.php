<?php

declare(strict_types=1);

namespace Application\Repository\Meeting;

use Application\Entity\Meeting;

interface FindMeeting
{
    public function findByName(string $name = '') : ?Meeting;
}
