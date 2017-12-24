<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\UserNotFoundException;
use Application\Repository\UserRepository;

class UserController
{
    /**
     * @var UserRepository
     */
    private $UserRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAction() : string
    {
        $searchName = $_GET['user'] ?? '';
        $selectedUser = $this->userRepository->findByName($searchName);

        if ($selectedUser === null) {
            return (new ErrorController(new UserNotFoundException($searchName)))->error404Action();
        }

        ob_start();
        include __DIR__.'/../../../views/user.phtml';
        return ob_get_clean();
    }
}
