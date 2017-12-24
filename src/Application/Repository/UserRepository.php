<?php

declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\User\FindUser;
use Application\Repository\User\FindAll;

interface UserRepository extends FindUser, FindAll
{
}
