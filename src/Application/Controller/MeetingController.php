<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\MeetingNotFoundException;
use Application\Repository\MeetingRepository;

final class MeetingController
{
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function indexAction() : string
    {
        $searchName = $_GET['meeting'] ?? '';

        $selectedMeeting = $this->meetingRepository->findByName($searchName);

        if ($selectedMeeting === null) {
            return (new ErrorController(new MeetingNotFoundException($searchName)))->error404Action();
        }

        ob_start();
        include __DIR__.'/../../../views/meeting.phtml';
        return ob_get_clean();
    }
}
