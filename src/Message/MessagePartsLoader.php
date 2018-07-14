<?php

namespace Gammabeam82\Bot\Message;

use Symfony\Component\Yaml\Yaml;

class MessagePartsLoader implements MessagePartsLoaderInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * MessagePartsLoader constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function getMessageParts(): array
    {
        return Yaml::parseFile($this->path);
    }
}
