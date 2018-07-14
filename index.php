<?php

require __DIR__ . '/vendor/autoload.php';

use Gammabeam82\Bot\Bot;
use Gammabeam82\Bot\DependencyInjection\AppContainerBuilder;
use Gammabeam82\Bot\Factory\BotmanTelegramFactory;
use Symfony\Component\Yaml\Yaml;

if (false === isset($_SERVER['APP_ENV'])) {
    (new \Symfony\Component\Dotenv\Dotenv())->load(sprintf("%s/.env", __DIR__));
}

$config = Yaml::parseFile(sprintf("%s/config/parameters.yaml", __DIR__));

$container = (new AppContainerBuilder($config))->getContainer();

/** @var \Gammabeam82\Bot\Message\MessageProvider $messageProvider */
$messageProvider = $container->get('message_provider');

$botman = BotmanTelegramFactory::create(getenv('TELEGRAM_TOKEN'));

$bot = new Bot($botman, $messageProvider);
$bot->run();
