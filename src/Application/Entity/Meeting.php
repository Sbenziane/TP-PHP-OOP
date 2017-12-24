<?php

declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

final class Meeting
{
    use SlugifyHelper;

    /**
     * @var string
     */
	private $title;
	private $description;
	private $date_start;
	private $time_start
	private $date_end;
	private $time_end;
	private $community;

    public function __construct(string $title, string $description, string $date_start, string $time_start, string $date_end, string $time_end, string $community)
    {
		$dateS = new \DateTimeImmutable();
		$dateS->setDate($date_start);
		$dateS->setTime($time_start);
		$dateE = new \DateTimeImmutable();
		$dateE->setDate($date_end);
		$dateE->setTime($time_end);		
        $this->title = $title;
		$this->description = $description;
		$this->date_start = $dateS;
		$this->date_end = $dateE;
		$this->community = $community;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function slugifiedTitle() : string
    {
        return $this->slugify($this->getTitle());
    }

    public function getDescription(): string
    {
        return $this->description;
    }	

    public function getDateStart(): DateTimeImmutable
    {
        return $this->date_start;
    }	
	
    public function getDateEnd(): DateTimeImmutable
    {
        return $this->date_end;
    }		

    public function getCommunity(): string
    {
        return $this->community;
    }		
	
    public function is(string $title) : bool
    {
        return $title === $this->getTitle();
    }
}
