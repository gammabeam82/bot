<?php

namespace Tests\Message;

use Gammabeam82\Bot\Message\MessageProvider;
use PHPUnit\Framework\TestCase;

class MessageProviderTest extends TestCase
{
    protected $parts = ['parts' => [['a', 'b', 'c'], ['d', 'e', 'f']]];

    public function testGetReply()
    {
        $provider = new MessageProvider($this->parts);

        $this->assertTrue(is_string($provider->getReply(2)));
    }
}
