<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Repository\PdoMeetingRepository;
use PDO;
use Psr\Container\ContainerInterface;

final class MeetingRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PdoMeetingRepository
    {
        $databaseConnection = $container->get(PDO::class);

        return new PdoMeetingRepository($databaseConnection);
    }
}
