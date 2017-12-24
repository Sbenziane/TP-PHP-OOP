<?php

declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\User;

class UserCollection
{
    private $users;

    public function __construct(User ...$users)
    {
        $this->users = $users;
    }

    public function getUsers(): array
    {
        return $this->users;
    }
}
