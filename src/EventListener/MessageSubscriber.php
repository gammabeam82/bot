<?php

namespace Gammabeam82\Bot\EventListener;

use Gammabeam82\Bot\Event\Events;
use Gammabeam82\Bot\Event\MessageEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessageSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * MessageSubscriber constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            Events::INCOMING_MESSAGE => 'onIncomingMessage'
        ];
    }

    /**
     * @param MessageEvent $event
     */
    public function onIncomingMessage(MessageEvent $event): void
    {
        $user = $event->getUser();

        $data = sprintf(
            "id: %s\nusername: %s\nfirst name: %s\nlast name: %s\n",
            $user->getId(),
            $user->getUsername(),
            $user->getFirstName(),
            $user->getLastName()
        );

        $this->logger->info($data);
    }
}
