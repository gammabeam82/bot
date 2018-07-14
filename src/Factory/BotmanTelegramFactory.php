<?php

namespace Gammabeam82\Bot\Factory;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;

class BotmanTelegramFactory
{
    /**
     * @param string $token
     *
     * @return BotMan
     */
    public static function create(string $token): Botman
    {
        DriverManager::loadDriver(TelegramDriver::class);
        $botman = BotManFactory::create([
            "telegram" => [
                "token" => $token
            ]
        ]);

        return $botman;
    }
}
