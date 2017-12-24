<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoOrganizerRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class OrganizerRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PdoOrganizerRepository
    {
        $databaseConnection = $container->get(PDO::class);

        return new PdoOrganizerRepository($databaseConnection);
    }
}
