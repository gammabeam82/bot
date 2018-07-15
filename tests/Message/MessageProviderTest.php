<?php

namespace Tests\Message;

use Gammabeam82\Bot\Message\MessagePartsLoader;
use Gammabeam82\Bot\Message\MessageProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

class MessageProviderTest extends TestCase
{
    /**
     * @var MessageProvider
     */
    protected $provider;

    public function setUp()
    {
        $config = Yaml::parseFile(sprintf("%s/../../config/parameters.yaml", __DIR__));
        $loader = new MessagePartsLoader($config['parameters']['parts']);

        $this->provider = new MessageProvider($loader->getMessageParts());
    }

    public function testGreeting()
    {
        $this->assertTrue(is_string($this->provider->greeting()));
    }

    public function testGetReply()
    {
        $this->assertTrue(is_string($this->provider->getReply()));
        $this->assertEquals(3, substr_count($this->provider->getReply(3), "."));
    }
}
