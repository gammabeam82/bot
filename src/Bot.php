<?php

namespace Gammabeam82\Bot;

use BotMan\BotMan\BotMan;
use Gammabeam82\Bot\Event\MessageEvent;
use Gammabeam82\Bot\Message\MessageProviderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

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
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * Bot constructor.
     *
     * @param BotMan $botman
     * @param MessageProviderInterface $messageProvider
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(BotMan $botman, MessageProviderInterface $messageProvider, EventDispatcherInterface $dispatcher)
    {
        $this->botman = $botman;
        $this->messageProvider = $messageProvider;
        $this->dispatcher = $dispatcher;
    }

    public function run(): void
    {
        $messageProvider = $this->messageProvider;
        $dispatcher = $this->dispatcher;

        $this->botman->hears('/start', function (BotMan $bot) use ($messageProvider) {
            $bot->reply($messageProvider->greeting());
        });

        $this->botman->hears('([1-9])', function (BotMan $bot, int $number) use ($messageProvider, $dispatcher) {
            $bot->reply($messageProvider->getReply($number));

            if (false !== (bool)getenv('LOG')) {
                $messageEvent = new MessageEvent($bot->getMessage(), $bot->getUser());
                $dispatcher->dispatch($messageEvent);
            }
        });

        $this->botman->listen();
    }
}