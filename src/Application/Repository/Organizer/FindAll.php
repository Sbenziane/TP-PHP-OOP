<?php

declare(strict_types=1);

namespace Application\Repository\Organizer;

use Application\Collection\OrganizerCollection;

interface FindAll
{
    public function fetchAll() : OrganizerCollection;
}
