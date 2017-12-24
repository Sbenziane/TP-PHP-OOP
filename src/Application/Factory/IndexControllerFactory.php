<?php

declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\IndexController;
use Application\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

final class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $communityRepository = $container->get(CommunityRepository::class);

        return new IndexController($communityRepository);
    }
}
