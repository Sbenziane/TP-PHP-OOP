<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\CommunityNotFoundException;
use Application\Repository\CommunityRepository;

final class CommunityController
{
    /**
     * @var CommunityRepository
     */
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepository)
    {
        $this->communityRepository = $communityRepository;
    }

    public function indexAction() : string
    {
        $searchName = $_GET['community'] ?? '';
        $selectedCommunity = $this->communityRepository->findByName($searchName);

        if ($selectedCommunity === null) {
            return (new ErrorController(new CommunityNotFoundException($searchName)))->error404Action();
        }

        ob_start();
        include __DIR__.'/../../../views/community.phtml';
        return ob_get_clean();
    }
}
