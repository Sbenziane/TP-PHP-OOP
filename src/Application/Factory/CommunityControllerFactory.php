<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\CommunityController;
use Application\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

final class CommunityControllerFactory
{
    public function __invoke(ContainerInterface $container) : CommunityController
    {
        $communityRepository = $container->get(CommunityRepository::class);

        return new CommunityController($communityRepository);
    }
}
