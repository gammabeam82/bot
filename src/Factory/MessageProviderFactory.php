<?php

namespace Gammabeam82\Bot\Factory;

use Gammabeam82\Bot\Message\MessagePartsLoaderInterface;
use Gammabeam82\Bot\Message\MessageProvider;
use Gammabeam82\Bot\Message\MessageProviderInterface;

class MessageProviderFactory
{
    /**
     * @param MessagePartsLoaderInterface $loader
     *
     * @return MessageProviderInterface
     */
    public static function create(MessagePartsLoaderInterface $loader): MessageProviderInterface
    {
        return new MessageProvider($loader->getMessageParts());
    }
}
