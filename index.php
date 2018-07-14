<?php

require __DIR__ . '/vendor/autoload.php';

use Gammabeam82\Bot\DependencyInjection\AppContainerBuilder;
use Symfony\Component\Yaml\Yaml;

if (false === isset($_SERVER['APP_ENV'])) {
    (new \Symfony\Component\Dotenv\Dotenv())->load(sprintf("%s/.env", __DIR__));
}

$config = Yaml::parseFile(sprintf("%s/config/parameters.yaml", __DIR__));

$container = (new AppContainerBuilder($config))->getContainer();

$bot = $container->get('bot');
$bot->run();
