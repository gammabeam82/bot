<?php

namespace Gammabeam82\Bot;

use BotMan\BotMan\BotMan;
use Gammabeam82\Bot\Message\MessageProviderInterface;

class Bot
{
    /**
     * @var MessageProviderInterface
     */
    protected $messageProvider;

    /**
     * @var BotMan
     */
    protected $botman;

    /**
     * Bot constructor.
     *
     * @param BotMan $botman
     * @param MessageProviderInterface $messageProvider
     */
    public function __construct(BotMan $botman, MessageProviderInterface $messageProvider)
    {
        $this->botman = $botman;
        $this->messageProvider = $messageProvider;
    }

    public function run(): void
    {
        $messageProvider = $this->messageProvider;

        $this->botman->hears('/start', function (BotMan $bot) use ($messageProvider) {
            $bot->reply($messageProvider->greeting());
        });

        $this->botman->hears('([1-9])', function (BotMan $bot, int $number) use ($messageProvider) {
            $bot->reply($messageProvider->getReply($number));
        });

        $this->botman->listen();
    }
}