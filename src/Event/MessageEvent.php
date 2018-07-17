<?php

namespace Gammabeam82\Bot\Event;

use BotMan\BotMan\Interfaces\UserInterface;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use Symfony\Component\EventDispatcher\Event;

class MessageEvent extends Event
{
    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @var IncomingMessage
     */
    protected $message;

    /**
     * MessageEvent constructor.
     *
     * @param IncomingMessage $message
     * @param UserInterface $user
     */
    public function __construct(IncomingMessage $message, UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return IncomingMessage
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }
}
