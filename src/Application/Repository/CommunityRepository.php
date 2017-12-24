<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Community\FindCommunity;
use Application\Repository\Community\FindAll;

interface CommunityRepository extends FindCommunity, FindAll
{
}
