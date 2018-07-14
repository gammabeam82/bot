<?php

require __DIR__ . '/vendor/autoload.php';

use Gammabeam82\Bot\Bot;
use Gammabeam82\Bot\Factory\BotmanTelegramFactory;
use Gammabeam82\Bot\Factory\MessageProviderFactory;
use Symfony\Component\Yaml\Yaml;

if (false === isset($_SERVER['APP_ENV'])) {
    (new \Symfony\Component\Dotenv\Dotenv())->load(sprintf("%s/.env", __DIR__));
}

$config = Yaml::parseFile(sprintf("%s/config/parameters.yaml", __DIR__));

$messageProvider = MessageProviderFactory::create($config);
$botman = BotmanTelegramFactory::create(getenv('TELEGRAM_TOKEN'));

$bot = new Bot($botman, $messageProvider);
$bot->run();
