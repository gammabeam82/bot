<?php

require __DIR__ . '/vendor/autoload.php';

use Gammabeam82\Bot\DependencyInjection\AppContainerBuilder;

if (false === isset($_SERVER['APP_ENV'])) {
    (new \Symfony\Component\Dotenv\Dotenv())->load(sprintf("%s/.env", __DIR__));
}

$container = (new AppContainerBuilder())->getContainer();

$bot = $container->get('bot');
$bot->run();
