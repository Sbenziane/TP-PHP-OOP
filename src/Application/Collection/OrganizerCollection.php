<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Organizer;

final class OrganizerCollection extends UserCollection
{
    private $organizers;

    public function __construct(Organizer ...$organizers)
    {
        $this->organizers = $organizers;
    }

    public function getOrganizers(): array
    {
        return $this->organizers;
    }
}
