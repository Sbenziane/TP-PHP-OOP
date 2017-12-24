<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Community;

final class CommunityCollection
{
    private $communities;

    public function __construct(Community ...$communities)
    {
        $this->communities = $communities;
    }

    public function getCommunities(): array
    {
        return $this->communities;
    }
}
