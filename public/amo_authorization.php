<?php
/*
 * Copyright (c) 2021. AMO | Корпоративный мессенджер.
 * Это  приложение - демо для документации по API.
 * Вы можете использовать данный код в своих проектах без сохранения этого копирайта.
 *
 * @Author Mike Eremin <meremin@team.amocrm.com>
 */

use AmoMessenger\ServiceApiClient;
use GuzzleHttp\Psr7\ServerRequest;
use Tutorial\Http\Controllers\AuthorizationController;
use Tutorial\Repository\AccessTokenFileRepository;

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';
//
$controller = new AuthorizationController(
    ServiceApiClient::fromGlobals(),
    new AccessTokenFileRepository('./store'),
);

$response = $controller(ServerRequest::fromGlobals());

\Tutorial\Http\Utils\HttpResponse::send($response);