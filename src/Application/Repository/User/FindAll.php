<?php

declare(strict_types=1);

namespace Application\Repository\User;

use Application\Collection\UserCollection;

interface FindAll
{
    public function fetchAll() : UserCollection;
}
