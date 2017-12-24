<?php

use Application\Controller\IndexController;
use Application\Controller\CommunityController;
use Application\Controller\MeetingController;
use Application\Controller\UserController;
use Application\Factory\DateTimeImmutableFactory;
use Application\Factory\DbConfigProviderFactory;
use Application\Factory\IndexControllerFactory;
use Application\Factory\CommunityControllerFactory;
use Application\Factory\CommunityRepositoryFactory;
use Application\Factory\MeetingControllerFactory;
use Application\Factory\MeetingRepositoryFactory;
use Application\Factory\UserControllerFactory;
use Application\Factory\UserRepositoryFactory;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\PdoConnectionFactory;
use Application\Factory\RouterFactory;
use Application\Provider\DbConfigProvider;
use Application\Repository\CommunityRepository;
use Application\Repository\MeetingRepository;
use Application\Repository\UserRepository;
use Application\Router\ParseUriHelper;
use Application\Router\Router;

return [
    'factories' => [
        // Configuration du "framework applicatif"
        ParseUriHelper::class => ParseUriHelperFactory::class,
        Router::class => RouterFactory::class,
        PDO::class => PdoConnectionFactory::class,
        DbConfigProvider::class => DbConfigProviderFactory::class,

        // Configurations liées aux comunities
        DateTimeInterface::class => DateTimeImmutableFactory::class,
        CommunityController::class => CommunityControllerFactory::class,
        IndexController::class => IndexControllerFactory::class,
        CommunityRepository::class => CommunityRepositoryFactory::class,

        // Configurations liées aux meetings
        MeetingController::class => MeetingControllerFactory::class,
        MeetingRepository::class => MeetingRepositoryFactory::class,

        // Configurations liées aux users
        UserController::class => UserControllerFactory::class,
        UserRepository::class => UserRepositoryFactory::class,
    ],
];
