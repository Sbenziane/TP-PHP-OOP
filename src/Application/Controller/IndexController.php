<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Repository\CommunityRepository;

final class IndexController
{
    /**
     * @var \Application\Repository\CommunityRepository
     */
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function indexAction() : string
    {
        $communities = $this->communityRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../views/index.phtml';
        return ob_get_clean();
    }
}
