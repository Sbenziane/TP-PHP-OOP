<?php

declare(strict_types=1);

namespace Application\Repository\Community;

use Application\Entity\Community;

interface FindCommunity
{
    public function findByName(string $name = '') : ?Community;
}
