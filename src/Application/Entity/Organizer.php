<?php

declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

class Organizer extends User
{
    use SlugifyHelper;

    /**
     * @var string
     */
    private $meeting;
	private $user;

    public function __construct(string $meeting, string $user)
    {
        $this->meeting = $meeting;
		$this->user = $user;
    }

    public function getMeeting(): string
    {
        return $this->meeting;
    }

    public function getUser(): string
    {
        return $this->user;
    }	
}
