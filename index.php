<?php

require __DIR__ . '/vendor/autoload.php';

use Gammabeam82\Bot\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

if (false === isset($_SERVER['APP_ENV'])) {
    (new \Symfony\Component\Dotenv\Dotenv())->load(sprintf("%s/.env", __DIR__));
}

$request = Request::createFromGlobals();

if (Request::METHOD_GET === $request->getMethod()) {
    $response = new RedirectResponse(sprintf("https://t.me/%s", getenv('BOTNAME')));
    $response->send();
}

$container = ContainerBuilder::getContainer();

$bot = $container->get('bot');
$bot->run();
