<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoCommunityRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class CommunityRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PdoCommunityRepository
    {
        $databaseConnection = $container->get(PDO::class);

        return new PdoCommunityRepository($databaseConnection);
    }
}
