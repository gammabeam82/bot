<?php

namespace Tests\Message;

use Gammabeam82\Bot\Message\MessagePartsLoader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

class MessagePartsLoaderTest extends TestCase
{
    /**
     * @var array
     */
    protected $config;

    public function setUp()
    {
        $this->config = Yaml::parseFile(sprintf("%s/../../config/parameters.yaml", __DIR__));
    }

    /**
     * @expectedException \Symfony\Component\Yaml\Exception\ParseException
     */
    public function testInvalidFile()
    {
        $loader = new MessagePartsLoader('');
        $loader->getMessageParts();
    }

    public function testGetMessageParts()
    {
        $messages = ($loader = new MessagePartsLoader($this->config['parts']))->getMessageParts();

        $this->assertTrue(is_array($messages));
        $this->assertArrayHasKey('parts', $messages);
        $this->assertTrue(is_string($messages['parts'][0][0]));
    }
}
