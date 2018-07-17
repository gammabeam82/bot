<?php

namespace Gammabeam82\Bot\Factory;

use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerFactory
{
    /**
     * @return LoggerInterface
     */
    public static function create(): LoggerInterface
    {
        $logger = new Logger('info');
        $logger->pushHandler(new StreamHandler('php://stderr', Logger::INFO));

        return $logger;
    }
}
