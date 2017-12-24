<?php

declare(strict_types=1);

namespace Application\Repository\Organizer;

use Application\Entity\Organizer;

interface FindOrganizer
{
    public function findByName(string $name = '') : ?Organizer;
}
