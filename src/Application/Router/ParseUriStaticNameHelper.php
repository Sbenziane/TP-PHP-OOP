<?php

declare(strict_types=1);

namespace Application\Router;

use Application\Controller\IndexController;
use Application\Controller\MeetingController;
use Application\Controller\CommunityController;
use Application\Controller\UserController;
use Exception;

use function explode;
use function preg_match;
use function substr;
use function urldecode;

final class ParseUriStaticNameHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if ($requestUri === '/') {
            $requestUri = substr($requestUri, 1);
        }
        if ($requestUri === '/community') {
            return CommunityController::class;
        }

        if (preg_match('#/community/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return CommunityController::class;
        }

        if ($requestUri === '/meeting') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return MeetingController::class;
        }

        if (preg_match('#/meeting/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return MeetingController::class;
        }		

        if ($requestUri === '/user') {
            return UserController::class;
        }

        if (preg_match('#/user/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return UserController::class;
        }	

        if ($requestUri === '/organizer') {
            return OrganizerController::class;
        }

        if (preg_match('#/organizer/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);
            return OrganizerController::class;
        }

        return IndexController::class;
    }
}
