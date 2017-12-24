<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\OrganizerController;
use Application\Repository\OrganizerRepository;
use Psr\Container\ContainerInterface;

final class UserControllerFactory
{
    public function __invoke(ContainerInterface $container) : OrganizerController
    {
        $organizerRepository = $container->get(OrganizerRepository::class);

        return new OrganizerController($organizerRepository);
    }
}
