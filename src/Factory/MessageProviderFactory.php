<?php

namespace Gammabeam82\Bot\Factory;

use Gammabeam82\Bot\Message\MessagePartsLoader;
use Gammabeam82\Bot\Message\MessageProvider;
use Gammabeam82\Bot\Message\MessageProviderInterface;

class MessageProviderFactory
{
    /**
     * @param array $config
     *
     * @return MessageProviderInterface
     */
    public static function create(array $config): MessageProviderInterface
    {
        $messageLoader = new MessagePartsLoader($config['parts']);

        $messages = $messageLoader->getMessageParts();

        return new MessageProvider($messages);
    }
}
