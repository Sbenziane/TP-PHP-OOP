<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\User\FindOrganizer;
use Application\Repository\User\FindAll;

interface OrganizerRepository extends FindOrganizer, FindAll
{
}
