<?php

declare(strict_types=1);

namespace Application\Repository\User;

use Application\Entity\User;

interface FindUser
{
    public function findByName(string $name = '') : ?User;
}
