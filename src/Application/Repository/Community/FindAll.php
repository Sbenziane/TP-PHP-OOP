<?php

declare(strict_types=1);

namespace Application\Repository\Community;

use Application\Collection\CommunityCollection;

interface FindAll
{
    public function fetchAll() : CommunityCollection;
}
