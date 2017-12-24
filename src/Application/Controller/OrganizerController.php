<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\OrganizerNotFoundException;
use Application\Repository\OrganizerRepository;

final class OrganizerController extends UserController
{
    /**
     * @var OrganiserRepository
     */
    private $organizerRepository;

    public function __construct(OrganizerRepository $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }

    public function indexAction() : string
    {
        $searchName = $_GET['organizer'] ?? '';
        $selectedUser = $this->organizerRepository->findByName($searchName);

        if ($selectedOrganizer === null) {
            return (new ErrorController(new OrganizerNotFoundException($searchName)))->error404Action();
        }

        ob_start();
        include __DIR__.'/../../../views/organizer.phtml';
        return ob_get_clean();
    }
}
