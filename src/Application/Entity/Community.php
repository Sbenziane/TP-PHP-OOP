<?php

declare(strict_types=1);

namespace Application\Entity;

use Application\Helper\SlugifyHelper;

final class Community
{
    use SlugifyHelper;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function slugifiedName() : string
    {
        return $this->slugify($this->getName());
    }

    public function is(string $name) : bool
    {
        return $name === $this->getName();
    }
}
