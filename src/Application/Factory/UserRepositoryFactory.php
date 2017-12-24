<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoUserRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class UserRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PdoUserRepository
    {
        $databaseConnection = $container->get(PDO::class);

        return new PdoUserRepository($databaseConnection);
    }
}
