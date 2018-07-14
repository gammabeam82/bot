<?php

namespace Gammabeam82\Bot\Factory;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

class BotmanTelegramFactory
{
    /**
     * @return BotMan
     */
    public static function create(): Botman
    {
        DriverManager::loadDriver(TelegramDriver::class);
        $botman = BotManFactory::create([
            "telegram" => [
                "token" => getenv('TELEGRAM_TOKEN')
            ]
        ]);

        return $botman;
    }
}
